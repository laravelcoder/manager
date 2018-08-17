<?php

namespace App\Http\Controllers\Admin;

use App\Cso;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCsosRequest;
use App\Http\Requests\Admin\UpdateCsosRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class CsosController extends Controller
{
    /**
     * Display a listing of Cso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('cso_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = Cso::query();
            $query->with('channel_server');
            $query->with('channel');
            $template = 'actionsTemplate';
            if (request('show_deleted') == 1) {
                if (!Gate::allows('cso_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'csos.id',
                'csos.channel_server_id',
                'csos.channel_id',
                'csos.ocloud_a',
                'csos.ocp_a',
                'csos.ocloud_b',
                'csos.ocp_b',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'cso_';
                $routeKey = 'admin.csos';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('channel_server.name', function ($row) {
                return $row->channel_server ? $row->channel_server->name : '';
            });
            $table->editColumn('channel.channel_name', function ($row) {
                return $row->channel ? $row->channel->channel_name : '';
            });
            $table->editColumn('ocloud_a', function ($row) {
                return $row->ocloud_a ? $row->ocloud_a : '';
            });
            $table->editColumn('ocp_a', function ($row) {
                return $row->ocp_a ? $row->ocp_a : '';
            });
            $table->editColumn('ocloud_b', function ($row) {
                return $row->ocloud_b ? $row->ocloud_b : '';
            });
            $table->editColumn('ocp_b', function ($row) {
                return $row->ocp_b ? $row->ocp_b : '';
            });

            $table->rawColumns(['actions', 'massDelete']);

            return $table->make(true);
        }

        return view('admin.csos.index');
    }

    /**
     * Show the form for creating new Cso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('cso_create')) {
            return abort(401);
        }

        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\CsChannelList::get()->pluck('channel_name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.csos.create', compact('channel_servers', 'channels'));
    }

    /**
     * Store a newly created Cso in storage.
     *
     * @param \App\Http\Requests\StoreCsosRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCsosRequest $request)
    {
        if (!Gate::allows('cso_create')) {
            return abort(401);
        }
        $cso = Cso::create($request->all());

        return redirect()->route('admin.csos.index');
    }

    /**
     * Show the form for editing Cso.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('cso_edit')) {
            return abort(401);
        }

        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\CsChannelList::get()->pluck('channel_name', 'id')->prepend(trans('global.app_please_select'), '');

        $cso = Cso::findOrFail($id);

        return view('admin.csos.edit', compact('cso', 'channel_servers', 'channels'));
    }

    /**
     * Update Cso in storage.
     *
     * @param \App\Http\Requests\UpdateCsosRequest $request
     * @param int                                  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCsosRequest $request, $id)
    {
        if (!Gate::allows('cso_edit')) {
            return abort(401);
        }
        $cso = Cso::findOrFail($id);
        $cso->update($request->all());

        return redirect()->route('admin.csos.index');
    }

    /**
     * Display Cso.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('cso_view')) {
            return abort(401);
        }
        $cso = Cso::findOrFail($id);

        return view('admin.csos.show', compact('cso'));
    }

    /**
     * Remove Cso from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('cso_delete')) {
            return abort(401);
        }
        $cso = Cso::findOrFail($id);
        $cso->delete();

        return redirect()->route('admin.csos.index');
    }

    /**
     * Delete all selected Cso at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('cso_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Cso::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Restore Cso from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('cso_delete')) {
            return abort(401);
        }
        $cso = Cso::onlyTrashed()->findOrFail($id);
        $cso->restore();

        return redirect()->route('admin.csos.index');
    }

    /**
     * Permanently delete Cso from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('cso_delete')) {
            return abort(401);
        }
        $cso = Cso::onlyTrashed()->findOrFail($id);
        $cso->forceDelete();

        return redirect()->route('admin.csos.index');
    }
}
