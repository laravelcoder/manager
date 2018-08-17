<?php

namespace App\Http\Controllers\Admin;

use App\AggregationServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAggregationServersRequest;
use App\Http\Requests\Admin\UpdateAggregationServersRequest;
use Yajra\DataTables\DataTables;

class AggregationServersController extends Controller
{
    /**
     * Display a listing of AggregationServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('aggregation_server_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = AggregationServer::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('aggregation_server_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'aggregation_servers.id',
                'aggregation_servers.server_name',
                'aggregation_servers.server_host',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'aggregation_server_';
                $routeKey = 'admin.aggregation_servers';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('server_name', function ($row) {
                return $row->server_name ? $row->server_name : '';
            });
            $table->editColumn('server_host', function ($row) {
                return $row->server_host ? $row->server_host : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.aggregation_servers.index');
    }

    /**
     * Show the form for creating new AggregationServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('aggregation_server_create')) {
            return abort(401);
        }
        return view('admin.aggregation_servers.create');
    }

    /**
     * Store a newly created AggregationServer in storage.
     *
     * @param  \App\Http\Requests\StoreAggregationServersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAggregationServersRequest $request)
    {
        if (! Gate::allows('aggregation_server_create')) {
            return abort(401);
        }
        $aggregation_server = AggregationServer::create($request->all());

        foreach ($request->input('baby_sync_servers', []) as $data) {
            $aggregation_server->baby_sync_servers()->create($data);
        }


        return redirect()->route('admin.aggregation_servers.index');
    }


    /**
     * Show the form for editing AggregationServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('aggregation_server_edit')) {
            return abort(401);
        }
        $aggregation_server = AggregationServer::findOrFail($id);

        return view('admin.aggregation_servers.edit', compact('aggregation_server'));
    }

    /**
     * Update AggregationServer in storage.
     *
     * @param  \App\Http\Requests\UpdateAggregationServersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAggregationServersRequest $request, $id)
    {
        if (! Gate::allows('aggregation_server_edit')) {
            return abort(401);
        }
        $aggregation_server = AggregationServer::findOrFail($id);
        $aggregation_server->update($request->all());

        $babySyncServers           = $aggregation_server->baby_sync_servers;
        $currentBabySyncServerData = [];
        foreach ($request->input('baby_sync_servers', []) as $index => $data) {
            if (is_integer($index)) {
                $aggregation_server->baby_sync_servers()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentBabySyncServerData[$id] = $data;
            }
        }
        foreach ($babySyncServers as $item) {
            if (isset($currentBabySyncServerData[$item->id])) {
                $item->update($currentBabySyncServerData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.aggregation_servers.index');
    }


    /**
     * Display AggregationServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('aggregation_server_view')) {
            return abort(401);
        }
        $baby_sync_servers = \App\BabySyncServer::where('parent_aggregation_server_id', $id)->get();

        $aggregation_server = AggregationServer::findOrFail($id);

        return view('admin.aggregation_servers.show', compact('aggregation_server', 'baby_sync_servers'));
    }


    /**
     * Remove AggregationServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('aggregation_server_delete')) {
            return abort(401);
        }
        $aggregation_server = AggregationServer::findOrFail($id);
        $aggregation_server->delete();

        return redirect()->route('admin.aggregation_servers.index');
    }

    /**
     * Delete all selected AggregationServer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('aggregation_server_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = AggregationServer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore AggregationServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('aggregation_server_delete')) {
            return abort(401);
        }
        $aggregation_server = AggregationServer::onlyTrashed()->findOrFail($id);
        $aggregation_server->restore();

        return redirect()->route('admin.aggregation_servers.index');
    }

    /**
     * Permanently delete AggregationServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('aggregation_server_delete')) {
            return abort(401);
        }
        $aggregation_server = AggregationServer::onlyTrashed()->findOrFail($id);
        $aggregation_server->forceDelete();

        return redirect()->route('admin.aggregation_servers.index');
    }
}
