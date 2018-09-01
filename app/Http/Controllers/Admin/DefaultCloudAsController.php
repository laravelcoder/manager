<?php

namespace App\Http\Controllers\Admin;

use App\DefaultCloudA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDefaultCloudAsRequest;
use App\Http\Requests\Admin\UpdateDefaultCloudAsRequest;
use Yajra\DataTables\DataTables;

class DefaultCloudAsController extends Controller
{
    /**
     * Display a listing of DefaultCloudA.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('default_cloud_a_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = DefaultCloudA::query();
            $query->with("channel_server");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('default_cloud_a_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'default_cloud_as.id',
                'default_cloud_as.address',
                'default_cloud_as.port',
                'default_cloud_as.channel_server_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'default_cloud_a_';
                $routeKey = 'admin.default_cloud_as';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('port', function ($row) {
                return $row->port ? $row->port : '';
            });
            $table->editColumn('channel_server.name', function ($row) {
                return $row->channel_server ? $row->channel_server->name : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.default_cloud_as.index');
    }

    /**
     * Show the form for creating new DefaultCloudA.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('default_cloud_a_create')) {
            return abort(401);
        }
        
        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.default_cloud_as.create', compact('channel_servers'));
    }

    /**
     * Store a newly created DefaultCloudA in storage.
     *
     * @param  \App\Http\Requests\StoreDefaultCloudAsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDefaultCloudAsRequest $request)
    {
        if (! Gate::allows('default_cloud_a_create')) {
            return abort(401);
        }
        $default_cloud_a = DefaultCloudA::create($request->all());



        return redirect()->route('admin.default_cloud_as.index');
    }


    /**
     * Show the form for editing DefaultCloudA.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('default_cloud_a_edit')) {
            return abort(401);
        }
        
        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $default_cloud_a = DefaultCloudA::findOrFail($id);

        return view('admin.default_cloud_as.edit', compact('default_cloud_a', 'channel_servers'));
    }

    /**
     * Update DefaultCloudA in storage.
     *
     * @param  \App\Http\Requests\UpdateDefaultCloudAsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDefaultCloudAsRequest $request, $id)
    {
        if (! Gate::allows('default_cloud_a_edit')) {
            return abort(401);
        }
        $default_cloud_a = DefaultCloudA::findOrFail($id);
        $default_cloud_a->update($request->all());



        return redirect()->route('admin.default_cloud_as.index');
    }


    /**
     * Display DefaultCloudA.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('default_cloud_a_view')) {
            return abort(401);
        }
        $default_cloud_a = DefaultCloudA::findOrFail($id);

        return view('admin.default_cloud_as.show', compact('default_cloud_a'));
    }


    /**
     * Remove DefaultCloudA from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('default_cloud_a_delete')) {
            return abort(401);
        }
        $default_cloud_a = DefaultCloudA::findOrFail($id);
        $default_cloud_a->delete();

        return redirect()->route('admin.default_cloud_as.index');
    }

    /**
     * Delete all selected DefaultCloudA at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('default_cloud_a_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = DefaultCloudA::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore DefaultCloudA from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('default_cloud_a_delete')) {
            return abort(401);
        }
        $default_cloud_a = DefaultCloudA::onlyTrashed()->findOrFail($id);
        $default_cloud_a->restore();

        return redirect()->route('admin.default_cloud_as.index');
    }

    /**
     * Permanently delete DefaultCloudA from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('default_cloud_a_delete')) {
            return abort(401);
        }
        $default_cloud_a = DefaultCloudA::onlyTrashed()->findOrFail($id);
        $default_cloud_a->forceDelete();

        return redirect()->route('admin.default_cloud_as.index');
    }
}
