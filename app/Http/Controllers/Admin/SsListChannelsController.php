<?php

namespace App\Http\Controllers\Admin;

use App\SsListChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSsListChannelsRequest;
use App\Http\Requests\Admin\UpdateSsListChannelsRequest;
use Yajra\DataTables\DataTables;

class SsListChannelsController extends Controller
{
    /**
     * Display a listing of SsListChannel.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('ss_list_channel_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = SsListChannel::query();
            $query->with("sync_server");
            $query->with("channel");
            $query->with("channel_server");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('ss_list_channel_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'ss_list_channels.id',
                'ss_list_channels.sync_server_id',
                'ss_list_channels.channel_id',
                'ss_list_channels.channel_server_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'ss_list_channel_';
                $routeKey = 'admin.ss_list_channels';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('sync_server.name', function ($row) {
                return $row->sync_server ? $row->sync_server->name : '';
            });
            $table->editColumn('channel.channel_name', function ($row) {
                return $row->channel ? $row->channel->channel_name : '';
            });
            $table->editColumn('channel_server.name', function ($row) {
                return $row->channel_server ? $row->channel_server->name : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.ss_list_channels.index');
    }

    /**
     * Show the form for creating new SsListChannel.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('ss_list_channel_create')) {
            return abort(401);
        }
        
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        // $channels = \App\ChannelsList::get()->pluck('channel_name', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\CsChannelList::selectRaw('id, CONCAT(channel_name," | ", channel_type) as channel_name')->pluck('channel_name', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.ss_list_channels.create', compact('sync_servers', 'channels', 'channel_servers'));
    }

    /**
     * Store a newly created SsListChannel in storage.
     *
     * @param  \App\Http\Requests\StoreSsListChannelsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSsListChannelsRequest $request)
    {
        if (! Gate::allows('ss_list_channel_create')) {
            return abort(401);
        }
        $ss_list_channel = SsListChannel::create($request->all());



        return redirect()->route('admin.ss_list_channels.index');
    }


    /**
     * Show the form for editing SsListChannel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('ss_list_channel_edit')) {
            return abort(401);
        }
        
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        // $channels = \App\ChannelsList::get()->pluck('channel_name', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\CsChannelList::selectRaw('id, CONCAT(channel_name," | ", channel_type) as channel_name')->pluck('channel_name', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $ss_list_channel = SsListChannel::findOrFail($id);

        return view('admin.ss_list_channels.edit', compact('ss_list_channel', 'sync_servers', 'channels', 'channel_servers'));
    }

    /**
     * Update SsListChannel in storage.
     *
     * @param  \App\Http\Requests\UpdateSsListChannelsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSsListChannelsRequest $request, $id)
    {
        if (! Gate::allows('ss_list_channel_edit')) {
            return abort(401);
        }
        $ss_list_channel = SsListChannel::findOrFail($id);
        $ss_list_channel->update($request->all());



        return redirect()->route('admin.ss_list_channels.index');
    }


    /**
     * Display SsListChannel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('ss_list_channel_view')) {
            return abort(401);
        }
        $ss_list_channel = SsListChannel::findOrFail($id);

        return view('admin.ss_list_channels.show', compact('ss_list_channel'));
    }


    /**
     * Remove SsListChannel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('ss_list_channel_delete')) {
            return abort(401);
        }
        $ss_list_channel = SsListChannel::findOrFail($id);
        $ss_list_channel->delete();

        return redirect()->route('admin.ss_list_channels.index');
    }

    /**
     * Delete all selected SsListChannel at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('ss_list_channel_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = SsListChannel::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore SsListChannel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('ss_list_channel_delete')) {
            return abort(401);
        }
        $ss_list_channel = SsListChannel::onlyTrashed()->findOrFail($id);
        $ss_list_channel->restore();

        return redirect()->route('admin.ss_list_channels.index');
    }

    /**
     * Permanently delete SsListChannel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('ss_list_channel_delete')) {
            return abort(401);
        }
        $ss_list_channel = SsListChannel::onlyTrashed()->findOrFail($id);
        $ss_list_channel->forceDelete();

        return redirect()->route('admin.ss_list_channels.index');
    }
}
