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

/**
 * Controls the data flow into channel servers object and updates the view whenever data changes.
 */
class ChannelServersController extends Controller
{
    /**
     * Display a listing of ChannelServer.
     *
     * @return     \Illuminate\Http\Response
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
     * @return     \Illuminate\Http\Response
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
     * @param      \App\Http\Requests\StoreChannelServersRequest  $request
     * @return     \Illuminate\Http\Response
     */
    public function store(StoreChannelServersRequest $request)
    {
        if (! Gate::allows('channel_server_create')) {
            return abort(401);
        }
        $channel_server = ChannelServer::create($request->all());

        foreach ($request->input('default_cloud_as', []) as $data) {
            $channel_server->default_cloud_as()->create($data);
        }
        foreach ($request->input('default_cloud_bs', []) as $data) {
            $channel_server->default_cloud_bs()->create($data);
        }
        foreach ($request->input('local_outputs', []) as $data) {
            $channel_server->local_outputs()->create($data);
        }

        return redirect()->route('admin.channel_servers.index');
    }

    /**
     * Show the form for editing ChannelServer.
     *
     * @param      int                        $id
     * @return     \Illuminate\Http\Response
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
     * @param      \App\Http\Requests\UpdateChannelServersRequest  $request
     * @param      int                                             $id
     * @return     \Illuminate\Http\Response
     */
    public function update(UpdateChannelServersRequest $request, $id)
    {
        if (! Gate::allows('channel_server_edit')) {
            return abort(401);
        }
        $channel_server = ChannelServer::findOrFail($id);
        $channel_server->update($request->all());

        $defaultCloudAs = $channel_server->default_cloud_as;
        $currentDefaultCloudAData = [];
        foreach ($request->input('default_cloud_as', []) as $index => $data) {
            if (is_int($index)) {
                $channel_server->default_cloud_as()->create($data);
            } else {
                $id = explode('-', $index)[1];
                $currentDefaultCloudAData[$id] = $data;
            }
        }
        foreach ($defaultCloudAs as $item) {
            if (isset($currentDefaultCloudAData[$item->id])) {
                $item->update($currentDefaultCloudAData[$item->id]);
            } else {
                $item->delete();
            }
        }
        $defaultCloudBs = $channel_server->default_cloud_bs;
        $currentDefaultCloudBData = [];
        foreach ($request->input('default_cloud_bs', []) as $index => $data) {
            if (is_int($index)) {
                $channel_server->default_cloud_bs()->create($data);
            } else {
                $id = explode('-', $index)[1];
                $currentDefaultCloudBData[$id] = $data;
            }
        }
        foreach ($defaultCloudBs as $item) {
            if (isset($currentDefaultCloudBData[$item->id])) {
                $item->update($currentDefaultCloudBData[$item->id]);
            } else {
                $item->delete();
            }
        }
        $localOutputs = $channel_server->local_outputs;
        $currentLocalOutputData = [];
        foreach ($request->input('local_outputs', []) as $index => $data) {
            if (is_int($index)) {
                $channel_server->local_outputs()->create($data);
            } else {
                $id = explode('-', $index)[1];
                $currentLocalOutputData[$id] = $data;
            }
        }
        foreach ($localOutputs as $item) {
            if (isset($currentLocalOutputData[$item->id])) {
                $item->update($currentLocalOutputData[$item->id]);
            } else {
                $item->delete();
            }
        }

        return redirect()->route('admin.channel_servers.index');
    }

    /**
     * Display ChannelServer.
     *
     * @param      int                        $id
     * @return     \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('channel_server_view')) {
            return abort(401);
        }
        $csis = \App\Csi::where('channel_server_id', $id)->get();
        $csos = \App\Cso::where('channel_server_id', $id)->get();
        $cs_list_channels = \App\CsListChannel::where('channelserver_id', $id)->get();
        $ss_list_channels = \App\SsListChannel::where('channel_server_id', $id)->get();
        $default_cloud_as = \App\DefaultCloudA::where('channel_server_id', $id)->get();
        $default_cloud_bs = \App\DefaultCloudB::where('channel_server_id', $id)->get();
        $local_outputs = \App\LocalOutput::where('channel_server_id', $id)->get();

        $channel_server = ChannelServer::findOrFail($id);

        return view('admin.channel_servers.show', compact('channel_server', 'csis', 'csos', 'cs_list_channels', 'ss_list_channels', 'default_cloud_as', 'default_cloud_bs', 'local_outputs'));
    }

    /**
     * Remove ChannelServer from storage.
     *
     * @param      int                        $id
     * @return     \Illuminate\Http\Response
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
     * @param      Request  $request
     * @return     <type>   ( description_of_the_return_value )
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
     * @param      int                        $id
     * @return     \Illuminate\Http\Response
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
     * @param      int                        $id
     * @return     \Illuminate\Http\Response
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
