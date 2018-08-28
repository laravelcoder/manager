<?php

namespace App\Http\Controllers\Admin;

use App\BabySyncServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBabySyncServersRequest;
use App\Http\Requests\Admin\UpdateBabySyncServersRequest;
use Yajra\DataTables\DataTables;

class BabySyncServersController extends Controller
{
    /**
     * Display a listing of BabySyncServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('baby_sync_server_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = BabySyncServer::query();
            $query->with("parent_aggregation_server");
            $query->with("sync_server");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('baby_sync_server_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'baby_sync_servers.id',
                'baby_sync_servers.baby_sync_server',
                'baby_sync_servers.parent_aggregation_server_id',
                'baby_sync_servers.sync_server_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'baby_sync_server_';
                $routeKey = 'admin.baby_sync_servers';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('baby_sync_server', function ($row) {
                return $row->baby_sync_server ? $row->baby_sync_server : '';
            });
            $table->editColumn('parent_aggregation_server.server_name', function ($row) {
                return $row->parent_aggregation_server ? $row->parent_aggregation_server->server_name : '';
            });
            $table->editColumn('sync_server.name', function ($row) {
                return $row->sync_server ? $row->sync_server->name : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.baby_sync_servers.index');
    }

    /**
     * Show the form for creating new BabySyncServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('baby_sync_server_create')) {
            return abort(401);
        }
        
        $parent_aggregation_servers = \App\AggregationServer::get()->pluck('server_name', 'id')->prepend(trans('global.app_please_select'), '');
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.baby_sync_servers.create', compact('parent_aggregation_servers', 'sync_servers'));
    }

    /**
     * Store a newly created BabySyncServer in storage.
     *
     * @param  \App\Http\Requests\StoreBabySyncServersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBabySyncServersRequest $request)
    {
        if (! Gate::allows('baby_sync_server_create')) {
            return abort(401);
        }
        $baby_sync_server = BabySyncServer::create($request->all());



        return redirect()->route('admin.baby_sync_servers.index');
    }


    /**
     * Show the form for editing BabySyncServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('baby_sync_server_edit')) {
            return abort(401);
        }
        
        $parent_aggregation_servers = \App\AggregationServer::get()->pluck('server_name', 'id')->prepend(trans('global.app_please_select'), '');
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $baby_sync_server = BabySyncServer::findOrFail($id);

        return view('admin.baby_sync_servers.edit', compact('baby_sync_server', 'parent_aggregation_servers', 'sync_servers'));
    }

    /**
     * Update BabySyncServer in storage.
     *
     * @param  \App\Http\Requests\UpdateBabySyncServersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBabySyncServersRequest $request, $id)
    {
        if (! Gate::allows('baby_sync_server_edit')) {
            return abort(401);
        }
        $baby_sync_server = BabySyncServer::findOrFail($id);
        $baby_sync_server->update($request->all());



        return redirect()->route('admin.baby_sync_servers.index');
    }


    /**
     * Display BabySyncServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('baby_sync_server_view')) {
            return abort(401);
        }
        $baby_sync_server = BabySyncServer::findOrFail($id);

        return view('admin.baby_sync_servers.show', compact('baby_sync_server'));
    }


    /**
     * Remove BabySyncServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('baby_sync_server_delete')) {
            return abort(401);
        }
        $baby_sync_server = BabySyncServer::findOrFail($id);
        $baby_sync_server->delete();

        return redirect()->route('admin.baby_sync_servers.index');
    }

    /**
     * Delete all selected BabySyncServer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('baby_sync_server_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = BabySyncServer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore BabySyncServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('baby_sync_server_delete')) {
            return abort(401);
        }
        $baby_sync_server = BabySyncServer::onlyTrashed()->findOrFail($id);
        $baby_sync_server->restore();

        return redirect()->route('admin.baby_sync_servers.index');
    }

    /**
     * Permanently delete BabySyncServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('baby_sync_server_delete')) {
            return abort(401);
        }
        $baby_sync_server = BabySyncServer::onlyTrashed()->findOrFail($id);
        $baby_sync_server->forceDelete();

        return redirect()->route('admin.baby_sync_servers.index');
    }
}
