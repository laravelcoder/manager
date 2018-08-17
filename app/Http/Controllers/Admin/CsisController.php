<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace App\Http\Controllers\Admin;

use App\Csi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreCsisRequest;
use App\Http\Requests\Admin\UpdateCsisRequest;

class CsisController extends Controller
{
    /**
     * Display a listing of Csi.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('csi_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = Csi::query();
            $query->with('channel_server');
            $query->with('channel');
            $query->with('protocol');
            $template = 'actionsTemplate';
            if (request('show_deleted') === 1) {
                if (! Gate::allows('csi_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'csis.id',
                'csis.channel_server_id',
                'csis.channel_id',
                'csis.protocol_id',
                'csis.ssm',
                'csis.imc',
                'csis.ip',
                'csis.pid',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'csi_';
                $routeKey = 'admin.csis';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('channel_server.name', function ($row) {
                return $row->channel_server ? $row->channel_server->name : '';
            });
            $table->editColumn('channel.channel_name', function ($row) {
                return $row->channel ? $row->channel->channel_name : '';
            });
            $table->editColumn('protocol.protocol', function ($row) {
                return $row->protocol ? $row->protocol->protocol : '';
            });
            $table->editColumn('ssm', function ($row) {
                return $row->ssm ? $row->ssm : '';
            });
            $table->editColumn('imc', function ($row) {
                return $row->imc ? $row->imc : '';
            });
            $table->editColumn('ip', function ($row) {
                return $row->ip ? $row->ip : '';
            });
            $table->editColumn('pid', function ($row) {
                return $row->pid ? $row->pid : '';
            });

            $table->rawColumns(['actions', 'massDelete']);

            return $table->make(true);
        }

        return view('admin.csis.index');
    }

    /**
     * Show the form for creating new Csi.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('csi_create')) {
            return abort(401);
        }

        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\CsChannelList::get()->pluck('channel_name', 'id')->prepend(trans('global.app_please_select'), '');
        $protocols = \App\Protocol::get()->pluck('protocol', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.csis.create', compact('channel_servers', 'channels', 'protocols'));
    }

    /**
     * Store a newly created Csi in storage.
     *
     * @param  \App\Http\Requests\StoreCsisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCsisRequest $request)
    {
        if (! Gate::allows('csi_create')) {
            return abort(401);
        }
        $csi = Csi::create($request->all());

        return redirect()->route('admin.csis.index');
    }

    /**
     * Show the form for editing Csi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('csi_edit')) {
            return abort(401);
        }

        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\CsChannelList::get()->pluck('channel_name', 'id')->prepend(trans('global.app_please_select'), '');
        $protocols = \App\Protocol::get()->pluck('protocol', 'id')->prepend(trans('global.app_please_select'), '');

        $csi = Csi::findOrFail($id);

        return view('admin.csis.edit', compact('csi', 'channel_servers', 'channels', 'protocols'));
    }

    /**
     * Update Csi in storage.
     *
     * @param  \App\Http\Requests\UpdateCsisRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCsisRequest $request, $id)
    {
        if (! Gate::allows('csi_edit')) {
            return abort(401);
        }
        $csi = Csi::findOrFail($id);
        $csi->update($request->all());

        return redirect()->route('admin.csis.index');
    }

    /**
     * Display Csi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('csi_view')) {
            return abort(401);
        }
        $csi = Csi::findOrFail($id);

        return view('admin.csis.show', compact('csi'));
    }

    /**
     * Remove Csi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
        $csi = Csi::findOrFail($id);
        $csi->delete();

        return redirect()->route('admin.csis.index');
    }

    /**
     * Delete all selected Csi at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Csi::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Restore Csi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
        $csi = Csi::onlyTrashed()->findOrFail($id);
        $csi->restore();

        return redirect()->route('admin.csis.index');
    }

    /**
     * Permanently delete Csi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
        $csi = Csi::onlyTrashed()->findOrFail($id);
        $csi->forceDelete();

        return redirect()->route('admin.csis.index');
    }
}
