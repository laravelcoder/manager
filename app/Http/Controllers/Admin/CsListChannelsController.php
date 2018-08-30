<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Csi;
use App\Cso;
use App\ChannelServer;
use App\CsListChannel;
use App\SsListChannel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreCsListChannelsRequest;
use App\Http\Requests\Admin\UpdateCsListChannelsRequest;

class CsListChannelsController extends Controller
{
    /**
     * Display a listing of CsListChannel.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('cs_list_channel_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = CsListChannel::query();
            $query->with('channel');
            $query->with('channelserver');
            $query->with('sync_server');
            $template = 'actionsTemplate';
            if (request('show_deleted') === 1) {
                if (! Gate::allows('cs_list_channel_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'cs_list_channels.id',
                'cs_list_channels.channel_id',
                'cs_list_channels.channelserver_id',
                'cs_list_channels.sync_server_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'cs_list_channel_';
                $routeKey = 'admin.cs_list_channels';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('channel.channel_name', function ($row) {
                return $row->channel ? $row->channel->channel_name : '';
            });
            $table->editColumn('channelserver.name', function ($row) {
                return $row->channelserver ? $row->channelserver->name : '';
            });
            $table->editColumn('sync_server.name', function ($row) {
                return $row->sync_server ? $row->sync_server->name : '';
            });

            $table->rawColumns(['actions', 'massDelete']);

            return $table->make(true);
        }

        return view('admin.cs_list_channels.index');
    }

    /**
     * Show the form for creating new CsListChannel.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('cs_list_channel_create')) {
            return abort(401);
        }

        $channels = \App\ChannelsList::selectRaw('id, CONCAT(channel_name," |   ", channel_type) as channel_name')->pluck('channel_name', 'id')->prepend(trans('global.app_please_select'), '');
        $channelservers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.cs_list_channels.create', compact('channels', 'channelservers', 'sync_servers'));
    }

    /**
     * Store a newly created CsListChannel in storage.
     *
     * @param  \App\Http\Requests\StoreCsListChannelsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCsListChannelsRequest $request)
    {
        if (! Gate::allows('cs_list_channel_create')) {
            return abort(401);
        }
        $cs_list_channel = CsListChannel::create($request->all());

        if ($request->channelserver_id) {
            try {
                Csi::create([
                    'channel_server_id' => $request->channelserver_id,
                    'channel_id' => $request->channel_id,
                    'protocol_id' => null,
//                    'url' => null,
//                    'ssm' => null,
//                    'imc' => null,
//                    'ip' => null,
//                    'pid' => null
                ]);
            } catch (\Exception $e) {
                Log::alert($e);
            }

            try {
                Cso::create([
                    'channel_server_id' => $request->channelserver_id,
                    'channel_id' => $request->channel_id,
//                    "ocloud_a" => null,
//                    "ocp_a" => null,
//                    "ocloud_b" => null,
//                    "ocp_b" => null,
                ]);
            } catch (\Exception $e) {
                Log::alert($e);
            }
        }

        if ($request->sync_server_id) {
            try {
                SsListChannel::create([
                    'channel_server_id' => $request->channelserver_id,
                    'channel_id' => $request->channel_id,
                    'sync_server_id' => $request->sync_server_id,
                ]);
            } catch (\Exception $e) {
                Log::alert($e);
            }
        }

        return redirect()->route('admin.cs_list_channels.index');
    }

    /**
     * Show the form for editing CsListChannel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('cs_list_channel_edit')) {
            return abort(401);
        }

//        $channels = \App\ChannelsList::get()->pluck('channel_name', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\ChannelsList::selectRaw('id, CONCAT(channel_name," |   ", channel_type) as channel_name')->pluck('channel_name', 'id')->prepend(trans('global.app_please_select'), '');
        $channelservers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $cs_list_channel = CsListChannel::findOrFail($id);

        return view('admin.cs_list_channels.edit', compact('cs_list_channel', 'channels', 'channelservers', 'sync_servers'));
    }

    /**
     * Update CsListChannel in storage.
     *
     * @param  \App\Http\Requests\UpdateCsListChannelsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCsListChannelsRequest $request, $id)
    {
        if (! Gate::allows('cs_list_channel_edit')) {
            return abort(401);
        }
        $cs_list_channel = CsListChannel::findOrFail($id);
        $cs_list_channel->update($request->all());

        return redirect()->route('admin.cs_list_channels.index');
    }

    /**
     * Display CsListChannel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('cs_list_channel_view')) {
            return abort(401);
        }
        $cs_list_channel = CsListChannel::findOrFail($id);

        return view('admin.cs_list_channels.show', compact('cs_list_channel'));
    }

    /**
     * Remove CsListChannel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('cs_list_channel_delete')) {
            return abort(401);
        }
        $cs_list_channel = CsListChannel::findOrFail($id);
        $cs_list_channel->delete();

        return redirect()->route('admin.cs_list_channels.index');
    }

    /**
     * Delete all selected CsListChannel at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('cs_list_channel_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CsListChannel::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Restore CsListChannel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('cs_list_channel_delete')) {
            return abort(401);
        }
        $cs_list_channel = CsListChannel::onlyTrashed()->findOrFail($id);
        $cs_list_channel->restore();

        return redirect()->route('admin.cs_list_channels.index');
    }

    /**
     * Permanently delete CsListChannel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('cs_list_channel_delete')) {
            return abort(401);
        }
        $cs_list_channel = CsListChannel::onlyTrashed()->findOrFail($id);
        $cs_list_channel->forceDelete();

        return redirect()->route('admin.cs_list_channels.index');
    }
}
