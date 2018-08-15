<?php

namespace App\Http\Controllers\Admin;

use App\PerChannelConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePerChannelConfigurationsRequest;
use App\Http\Requests\Admin\UpdatePerChannelConfigurationsRequest;
use Yajra\DataTables\DataTables;

class PerChannelConfigurationsController extends Controller
{
    /**
     * Display a listing of PerChannelConfiguration.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('per_channel_configuration_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = PerChannelConfiguration::query();
            $query->with("rtn");
            $query->with("sync_server");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('per_channel_configuration_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'per_channel_configurations.id',
                'per_channel_configurations.cid',
                'per_channel_configurations.active',
                'per_channel_configurations.notify_channel_id',
                'per_channel_configurations.offset',
                'per_channel_configurations.ad_lengths',
                'per_channel_configurations.ad_spacing',
                'per_channel_configurations.rtn_id',
                'per_channel_configurations.sync_server_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'per_channel_configuration_';
                $routeKey = 'admin.per_channel_configurations';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('cid', function ($row) {
                return $row->cid ? $row->cid : '';
            });
            $table->editColumn('active', function ($row) {
                return \Form::checkbox("active", 1, $row->active == 1, ["disabled"]);
            });
            $table->editColumn('notify_channel_id', function ($row) {
                return $row->notify_channel_id ? $row->notify_channel_id : '';
            });
            $table->editColumn('offset', function ($row) {
                return $row->offset ? $row->offset : '';
            });
            $table->editColumn('ad_lengths', function ($row) {
                return $row->ad_lengths ? $row->ad_lengths : '';
            });
            $table->editColumn('ad_spacing', function ($row) {
                return $row->ad_spacing ? $row->ad_spacing : '';
            });
            $table->editColumn('rtn.server_type', function ($row) {
                return $row->rtn ? $row->rtn->server_type : '';
            });
            $table->editColumn('sync_server.name', function ($row) {
                return $row->sync_server ? $row->sync_server->name : '';
            });

            $table->rawColumns(['actions','massDelete','active']);

            return $table->make(true);
        }

        return view('admin.per_channel_configurations.index');
    }

    /**
     * Show the form for creating new PerChannelConfiguration.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('per_channel_configuration_create')) {
            return abort(401);
        }
        
        $rtns = \App\RealtimeNotification::get()->pluck('server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.per_channel_configurations.create', compact('rtns', 'sync_servers'));
    }

    /**
     * Store a newly created PerChannelConfiguration in storage.
     *
     * @param  \App\Http\Requests\StorePerChannelConfigurationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerChannelConfigurationsRequest $request)
    {
        if (! Gate::allows('per_channel_configuration_create')) {
            return abort(401);
        }
        $per_channel_configuration = PerChannelConfiguration::create($request->all());



        return redirect()->route('admin.per_channel_configurations.index');
    }


    /**
     * Show the form for editing PerChannelConfiguration.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('per_channel_configuration_edit')) {
            return abort(401);
        }
        
        $rtns = \App\RealtimeNotification::get()->pluck('server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $per_channel_configuration = PerChannelConfiguration::findOrFail($id);

        return view('admin.per_channel_configurations.edit', compact('per_channel_configuration', 'rtns', 'sync_servers'));
    }

    /**
     * Update PerChannelConfiguration in storage.
     *
     * @param  \App\Http\Requests\UpdatePerChannelConfigurationsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerChannelConfigurationsRequest $request, $id)
    {
        if (! Gate::allows('per_channel_configuration_edit')) {
            return abort(401);
        }
        $per_channel_configuration = PerChannelConfiguration::findOrFail($id);
        $per_channel_configuration->update($request->all());



        return redirect()->route('admin.per_channel_configurations.index');
    }


    /**
     * Display PerChannelConfiguration.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('per_channel_configuration_view')) {
            return abort(401);
        }
        $per_channel_configuration = PerChannelConfiguration::findOrFail($id);

        return view('admin.per_channel_configurations.show', compact('per_channel_configuration'));
    }


    /**
     * Remove PerChannelConfiguration from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('per_channel_configuration_delete')) {
            return abort(401);
        }
        $per_channel_configuration = PerChannelConfiguration::findOrFail($id);
        $per_channel_configuration->delete();

        return redirect()->route('admin.per_channel_configurations.index');
    }

    /**
     * Delete all selected PerChannelConfiguration at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('per_channel_configuration_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = PerChannelConfiguration::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore PerChannelConfiguration from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('per_channel_configuration_delete')) {
            return abort(401);
        }
        $per_channel_configuration = PerChannelConfiguration::onlyTrashed()->findOrFail($id);
        $per_channel_configuration->restore();

        return redirect()->route('admin.per_channel_configurations.index');
    }

    /**
     * Permanently delete PerChannelConfiguration from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('per_channel_configuration_delete')) {
            return abort(401);
        }
        $per_channel_configuration = PerChannelConfiguration::onlyTrashed()->findOrFail($id);
        $per_channel_configuration->forceDelete();

        return redirect()->route('admin.per_channel_configurations.index');
    }
}
