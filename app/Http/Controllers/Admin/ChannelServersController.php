<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\ChannelServer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreChannelServersRequest;
use App\Http\Requests\Admin\UpdateChannelServersRequest;

class ChannelServersController extends Controller
{
    /**
     * Display a listing of ChannelServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('channel_server_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = ChannelServer::query();
            $template = 'actionsTemplate';
            if (request('show_deleted') === 1) {
                if (! Gate::allows('channel_server_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'channel_servers.id',
                'channel_servers.name',
                'channel_servers.cs_host',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'channel_server_';
                $routeKey = 'admin.channel_servers';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('cs_host', function ($row) {
                return $row->cs_host ? $row->cs_host : '';
            });

            $table->rawColumns(['actions', 'massDelete']);

            return $table->make(true);
        }

        return view('admin.channel_servers.index');
    }

    /**
     * Show the form for creating new ChannelServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('channel_server_create')) {
            return abort(401);
        }

        return view('admin.channel_servers.create');
    }

    /**
     * Store a newly created ChannelServer in storage.
     *
     * @param  \App\Http\Requests\StoreChannelServersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChannelServersRequest $request)
    {
        if (! Gate::allows('channel_server_create')) {
            return abort(401);
        }
        $channel_server = ChannelServer::create($request->all());

        foreach ($request->input('cs_channel_lists', []) as $data) {
            $channel_server->cs_channel_lists()->create($data);
        }

        return redirect()->route('admin.channel_servers.index');
    }

    /**
     * Show the form for editing ChannelServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('channel_server_edit')) {
            return abort(401);
        }
        $channel_server = ChannelServer::findOrFail($id);

        return view('admin.channel_servers.edit', compact('channel_server'));
    }

    /**
     * Update ChannelServer in storage.
     *
     * @param  \App\Http\Requests\UpdateChannelServersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChannelServersRequest $request, $id)
    {
        if (! Gate::allows('channel_server_edit')) {
            return abort(401);
        }
        $channel_server = ChannelServer::findOrFail($id);
        $channel_server->update($request->all());

        $csChannelLists = $channel_server->cs_channel_lists;
        $currentCsChannelListData = [];
        foreach ($request->input('cs_channel_lists', []) as $index => $data) {
            if (is_int($index)) {
                $channel_server->cs_channel_lists()->create($data);
            } else {
                $id = explode('-', $index)[1];
                $currentCsChannelListData[$id] = $data;
            }
        }
        foreach ($csChannelLists as $item) {
            if (isset($currentCsChannelListData[$item->id])) {
                $item->update($currentCsChannelListData[$item->id]);
            } else {
                $item->delete();
            }
        }

        return redirect()->route('admin.channel_servers.index');
    }

    /**
     * Display ChannelServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('channel_server_view')) {
            return abort(401);
        }

        $cs_channel_lists = \App\CsChannelList::where('channel_server_id', $id)->get();
        $csis = \App\Csi::where('channel_server_id', $id)->get();
        $csos = \App\Cso::where('channel_server_id', $id)->get();
        $channel_server = ChannelServer::findOrFail($id);

        return view('admin.channel_servers.show', compact('channel_server', 'csis', 'csos', 'cs_channel_lists'));
    }

    /**
     * Remove ChannelServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('channel_server_delete')) {
            return abort(401);
        }
        $channel_server = ChannelServer::findOrFail($id);
        $channel_server->delete();

        return redirect()->route('admin.channel_servers.index');
    }

    /**
     * Delete all selected ChannelServer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('channel_server_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ChannelServer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Restore ChannelServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('channel_server_delete')) {
            return abort(401);
        }
        $channel_server = ChannelServer::onlyTrashed()->findOrFail($id);
        $channel_server->restore();

        return redirect()->route('admin.channel_servers.index');
    }

    /**
     * Permanently delete ChannelServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('channel_server_delete')) {
            return abort(401);
        }
        $channel_server = ChannelServer::onlyTrashed()->findOrFail($id);
        $channel_server->forceDelete();

        return redirect()->route('admin.channel_servers.index');
    }
}
