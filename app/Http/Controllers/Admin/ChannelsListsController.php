<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\ChannelsList;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreChannelsListsRequest;
use App\Http\Requests\Admin\UpdateChannelsListsRequest;

class ChannelsListsController extends Controller
{
    /**
     * Display a listing of ChannelsList.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('channels_list_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = ChannelsList::query();
            $template = 'actionsTemplate';
            if (request('show_deleted') === 1) {
                if (! Gate::allows('channels_list_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'channels_lists.id',
                'channels_lists.channel_name',
                'channels_lists.channel_type',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'channels_list_';
                $routeKey = 'admin.channels_lists';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('channel_name', function ($row) {
                return $row->channel_name ? $row->channel_name : '';
            });
            $table->editColumn('channel_type', function ($row) {
                return $row->channel_type ? $row->channel_type : '';
            });

            $table->rawColumns(['actions', 'massDelete']);

            return $table->make(true);
        }

        return view('admin.channels_lists.index');
    }

    /**
     * Show the form for creating new ChannelsList.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('channels_list_create')) {
            return abort(401);
        }

        return view('admin.channels_lists.create');
    }

    /**
     * Store a newly created ChannelsList in storage.
     *
     * @param  \App\Http\Requests\StoreChannelsListsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChannelsListsRequest $request)
    {
        if (! Gate::allows('channels_list_create')) {
            return abort(401);
        }
        $channels_list = ChannelsList::create($request->all());

        return redirect()->route('admin.channels_lists.index');
    }

    /**
     * Show the form for editing ChannelsList.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('channels_list_edit')) {
            return abort(401);
        }
        $channels_list = ChannelsList::findOrFail($id);

        return view('admin.channels_lists.edit', compact('channels_list'));
    }

    /**
     * Update ChannelsList in storage.
     *
     * @param  \App\Http\Requests\UpdateChannelsListsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChannelsListsRequest $request, $id)
    {
        if (! Gate::allows('channels_list_edit')) {
            return abort(401);
        }
        $channels_list = ChannelsList::findOrFail($id);
        $channels_list->update($request->all());

        return redirect()->route('admin.channels_lists.index');
    }

    /**
     * Display ChannelsList.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('channels_list_view')) {
            return abort(401);
        }
        $cs_list_channels = \App\CsListChannel::where('channel_id', $id)->get();
        $channel_servers = \App\ChannelServer::whereHas('channel',
                    function ($query) use ($id): void {
                        $query->where('id', $id);
                    })->get();

        $channels_list = ChannelsList::findOrFail($id);

        return view('admin.channels_lists.show', compact('channels_list', 'cs_list_channels', 'channel_servers'));
    }

    /**
     * Remove ChannelsList from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('channels_list_delete')) {
            return abort(401);
        }
        $channels_list = ChannelsList::findOrFail($id);
        $channels_list->delete();

        return redirect()->route('admin.channels_lists.index');
    }

    /**
     * Delete all selected ChannelsList at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('channels_list_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ChannelsList::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Restore ChannelsList from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('channels_list_delete')) {
            return abort(401);
        }
        $channels_list = ChannelsList::onlyTrashed()->findOrFail($id);
        $channels_list->restore();

        return redirect()->route('admin.channels_lists.index');
    }

    /**
     * Permanently delete ChannelsList from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('channels_list_delete')) {
            return abort(401);
        }
        $channels_list = ChannelsList::onlyTrashed()->findOrFail($id);
        $channels_list->forceDelete();

        return redirect()->route('admin.channels_lists.index');
    }
}
