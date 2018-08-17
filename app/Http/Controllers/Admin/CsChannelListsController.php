<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace App\Http\Controllers\Admin;

use App\CsChannelList;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreCsChannelListsRequest;
use App\Http\Requests\Admin\UpdateCsChannelListsRequest;

class CsChannelListsController extends Controller
{
    /**
     * Display a listing of CsChannelList.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('cs_channel_list_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = CsChannelList::query();
            $query->with('channel_server');
            $template = 'actionsTemplate';
            if (request('show_deleted') === 1) {
                if (! Gate::allows('cs_channel_list_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'cs_channel_lists.id',
                'cs_channel_lists.channel_server_id',
                'cs_channel_lists.channel_name',
                'cs_channel_lists.channel_type',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'cs_channel_list_';
                $routeKey = 'admin.cs_channel_lists';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('channel_server.name', function ($row) {
                return $row->channel_server ? $row->channel_server->name : '';
            });
            $table->editColumn('channel_name', function ($row) {
                return $row->channel_name ? $row->channel_name : '';
            });
            $table->editColumn('channel_type', function ($row) {
                return $row->channel_type ? $row->channel_type : '';
            });

            $table->rawColumns(['actions', 'massDelete']);

            return $table->make(true);
        }

        return view('admin.cs_channel_lists.index');
    }

    /**
     * Show the form for creating new CsChannelList.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('cs_channel_list_create')) {
            return abort(401);
        }

        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.cs_channel_lists.create', compact('channel_servers'));
    }

    /**
     * Store a newly created CsChannelList in storage.
     *
     * @param  \App\Http\Requests\StoreCsChannelListsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCsChannelListsRequest $request)
    {
        if (! Gate::allows('cs_channel_list_create')) {
            return abort(401);
        }
        $cs_channel_list = CsChannelList::create($request->all());

        return redirect()->route('admin.cs_channel_lists.index');
    }

    /**
     * Show the form for editing CsChannelList.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('cs_channel_list_edit')) {
            return abort(401);
        }

        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $cs_channel_list = CsChannelList::findOrFail($id);

        return view('admin.cs_channel_lists.edit', compact('cs_channel_list', 'channel_servers'));
    }

    /**
     * Update CsChannelList in storage.
     *
     * @param  \App\Http\Requests\UpdateCsChannelListsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCsChannelListsRequest $request, $id)
    {
        if (! Gate::allows('cs_channel_list_edit')) {
            return abort(401);
        }
        $cs_channel_list = CsChannelList::findOrFail($id);
        $cs_channel_list->update($request->all());

        return redirect()->route('admin.cs_channel_lists.index');
    }

    /**
     * Display CsChannelList.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('cs_channel_list_view')) {
            return abort(401);
        }

        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $csos = \App\Cso::where('channel_id', $id)->get();
        $csis = \App\Csi::where('channel_id', $id)->get();

        $cs_channel_list = CsChannelList::findOrFail($id);

        return view('admin.cs_channel_lists.show', compact('cs_channel_list', 'csos', 'csis'));
    }

    /**
     * Remove CsChannelList from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('cs_channel_list_delete')) {
            return abort(401);
        }
        $cs_channel_list = CsChannelList::findOrFail($id);
        $cs_channel_list->delete();

        return redirect()->route('admin.cs_channel_lists.index');
    }

    /**
     * Delete all selected CsChannelList at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('cs_channel_list_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CsChannelList::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Restore CsChannelList from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('cs_channel_list_delete')) {
            return abort(401);
        }
        $cs_channel_list = CsChannelList::onlyTrashed()->findOrFail($id);
        $cs_channel_list->restore();

        return redirect()->route('admin.cs_channel_lists.index');
    }

    /**
     * Permanently delete CsChannelList from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('cs_channel_list_delete')) {
            return abort(401);
        }
        $cs_channel_list = CsChannelList::onlyTrashed()->findOrFail($id);
        $cs_channel_list->forceDelete();

        return redirect()->route('admin.cs_channel_lists.index');
    }
}
