<?php

namespace App\Http\Controllers\Admin;

use App\DefaultCloudB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDefaultCloudBsRequest;
use App\Http\Requests\Admin\UpdateDefaultCloudBsRequest;
use Yajra\DataTables\DataTables;

class DefaultCloudBsController extends Controller
{
    /**
     * Display a listing of DefaultCloudB.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('default_cloud_b_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = DefaultCloudB::query();
            $query->with("channel_server");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('default_cloud_b_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'default_cloud_bs.id',
                'default_cloud_bs.address',
                'default_cloud_bs.port',
                'default_cloud_bs.channel_server_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'default_cloud_b_';
                $routeKey = 'admin.default_cloud_bs';

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

        return view('admin.default_cloud_bs.index');
    }

    /**
     * Show the form for creating new DefaultCloudB.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('default_cloud_b_create')) {
            return abort(401);
        }
        
        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.default_cloud_bs.create', compact('channel_servers'));
    }

    /**
     * Store a newly created DefaultCloudB in storage.
     *
     * @param  \App\Http\Requests\StoreDefaultCloudBsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDefaultCloudBsRequest $request)
    {
        if (! Gate::allows('default_cloud_b_create')) {
            return abort(401);
        }
        $default_cloud_b = DefaultCloudB::create($request->all());



        return redirect()->route('admin.default_cloud_bs.index');
    }


    /**
     * Show the form for editing DefaultCloudB.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('default_cloud_b_edit')) {
            return abort(401);
        }
        
        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $default_cloud_b = DefaultCloudB::findOrFail($id);

        return view('admin.default_cloud_bs.edit', compact('default_cloud_b', 'channel_servers'));
    }

    /**
     * Update DefaultCloudB in storage.
     *
     * @param  \App\Http\Requests\UpdateDefaultCloudBsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDefaultCloudBsRequest $request, $id)
    {
        if (! Gate::allows('default_cloud_b_edit')) {
            return abort(401);
        }
        $default_cloud_b = DefaultCloudB::findOrFail($id);
        $default_cloud_b->update($request->all());



        return redirect()->route('admin.default_cloud_bs.index');
    }


    /**
     * Display DefaultCloudB.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('default_cloud_b_view')) {
            return abort(401);
        }
        $default_cloud_b = DefaultCloudB::findOrFail($id);

        return view('admin.default_cloud_bs.show', compact('default_cloud_b'));
    }


    /**
     * Remove DefaultCloudB from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('default_cloud_b_delete')) {
            return abort(401);
        }
        $default_cloud_b = DefaultCloudB::findOrFail($id);
        $default_cloud_b->delete();

        return redirect()->route('admin.default_cloud_bs.index');
    }

    /**
     * Delete all selected DefaultCloudB at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('default_cloud_b_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = DefaultCloudB::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore DefaultCloudB from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('default_cloud_b_delete')) {
            return abort(401);
        }
        $default_cloud_b = DefaultCloudB::onlyTrashed()->findOrFail($id);
        $default_cloud_b->restore();

        return redirect()->route('admin.default_cloud_bs.index');
    }

    /**
     * Permanently delete DefaultCloudB from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('default_cloud_b_delete')) {
            return abort(401);
        }
        $default_cloud_b = DefaultCloudB::onlyTrashed()->findOrFail($id);
        $default_cloud_b->forceDelete();

        return redirect()->route('admin.default_cloud_bs.index');
    }
}
