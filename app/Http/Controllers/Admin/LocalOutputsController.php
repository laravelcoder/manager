<?php

namespace App\Http\Controllers\Admin;

use App\LocalOutput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLocalOutputsRequest;
use App\Http\Requests\Admin\UpdateLocalOutputsRequest;
use Yajra\DataTables\DataTables;

class LocalOutputsController extends Controller
{
    /**
     * Display a listing of LocalOutput.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('local_output_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = LocalOutput::query();
            $query->with("channel_server");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('local_output_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'local_outputs.id',
                'local_outputs.address',
                'local_outputs.port',
                'local_outputs.channel_server_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'local_output_';
                $routeKey = 'admin.local_outputs';

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

        return view('admin.local_outputs.index');
    }

    /**
     * Show the form for creating new LocalOutput.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('local_output_create')) {
            return abort(401);
        }
        
        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.local_outputs.create', compact('channel_servers'));
    }

    /**
     * Store a newly created LocalOutput in storage.
     *
     * @param  \App\Http\Requests\StoreLocalOutputsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocalOutputsRequest $request)
    {
        if (! Gate::allows('local_output_create')) {
            return abort(401);
        }
        $local_output = LocalOutput::create($request->all());



        return redirect()->route('admin.local_outputs.index');
    }


    /**
     * Show the form for editing LocalOutput.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('local_output_edit')) {
            return abort(401);
        }
        
        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $local_output = LocalOutput::findOrFail($id);

        return view('admin.local_outputs.edit', compact('local_output', 'channel_servers'));
    }

    /**
     * Update LocalOutput in storage.
     *
     * @param  \App\Http\Requests\UpdateLocalOutputsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocalOutputsRequest $request, $id)
    {
        if (! Gate::allows('local_output_edit')) {
            return abort(401);
        }
        $local_output = LocalOutput::findOrFail($id);
        $local_output->update($request->all());



        return redirect()->route('admin.local_outputs.index');
    }


    /**
     * Display LocalOutput.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('local_output_view')) {
            return abort(401);
        }
        $local_output = LocalOutput::findOrFail($id);

        return view('admin.local_outputs.show', compact('local_output'));
    }


    /**
     * Remove LocalOutput from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('local_output_delete')) {
            return abort(401);
        }
        $local_output = LocalOutput::findOrFail($id);
        $local_output->delete();

        return redirect()->route('admin.local_outputs.index');
    }

    /**
     * Delete all selected LocalOutput at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('local_output_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = LocalOutput::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore LocalOutput from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('local_output_delete')) {
            return abort(401);
        }
        $local_output = LocalOutput::onlyTrashed()->findOrFail($id);
        $local_output->restore();

        return redirect()->route('admin.local_outputs.index');
    }

    /**
     * Permanently delete LocalOutput from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('local_output_delete')) {
            return abort(401);
        }
        $local_output = LocalOutput::onlyTrashed()->findOrFail($id);
        $local_output->forceDelete();

        return redirect()->route('admin.local_outputs.index');
    }
}
