<?php

namespace App\Http\Controllers\Admin;

use App\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFiltersRequest;
use App\Http\Requests\Admin\UpdateFiltersRequest;
use Yajra\DataTables\DataTables;

class FiltersController extends Controller
{
    /**
     * Display a listing of Filter.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('filter_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Filter::query();
            $query->with("sync_server");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('filter_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'filters.id',
                'filters.name',
                'filters.sync_server_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'filter_';
                $routeKey = 'admin.filters';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('sync_server.name', function ($row) {
                return $row->sync_server ? $row->sync_server->name : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.filters.index');
    }

    /**
     * Show the form for creating new Filter.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('filter_create')) {
            return abort(401);
        }
        
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.filters.create', compact('sync_servers'));
    }

    /**
     * Store a newly created Filter in storage.
     *
     * @param  \App\Http\Requests\StoreFiltersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFiltersRequest $request)
    {
        if (! Gate::allows('filter_create')) {
            return abort(401);
        }
        $filter = Filter::create($request->all());



        return redirect()->route('admin.filters.index');
    }


    /**
     * Show the form for editing Filter.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('filter_edit')) {
            return abort(401);
        }
        
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $filter = Filter::findOrFail($id);

        return view('admin.filters.edit', compact('filter', 'sync_servers'));
    }

    /**
     * Update Filter in storage.
     *
     * @param  \App\Http\Requests\UpdateFiltersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFiltersRequest $request, $id)
    {
        if (! Gate::allows('filter_edit')) {
            return abort(401);
        }
        $filter = Filter::findOrFail($id);
        $filter->update($request->all());



        return redirect()->route('admin.filters.index');
    }


    /**
     * Display Filter.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('filter_view')) {
            return abort(401);
        }
        
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');$report_settings = \App\ReportSetting::where('filters_id', $id)->get();

        $filter = Filter::findOrFail($id);

        return view('admin.filters.show', compact('filter', 'report_settings'));
    }


    /**
     * Remove Filter from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('filter_delete')) {
            return abort(401);
        }
        $filter = Filter::findOrFail($id);
        $filter->delete();

        return redirect()->route('admin.filters.index');
    }

    /**
     * Delete all selected Filter at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('filter_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Filter::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Filter from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('filter_delete')) {
            return abort(401);
        }
        $filter = Filter::onlyTrashed()->findOrFail($id);
        $filter->restore();

        return redirect()->route('admin.filters.index');
    }

    /**
     * Permanently delete Filter from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('filter_delete')) {
            return abort(401);
        }
        $filter = Filter::onlyTrashed()->findOrFail($id);
        $filter->forceDelete();

        return redirect()->route('admin.filters.index');
    }
}
