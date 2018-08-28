<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\VideoServerType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreVideoServerTypesRequest;
use App\Http\Requests\Admin\UpdateVideoServerTypesRequest;

class VideoServerTypesController extends Controller
{
    /**
     * Display a listing of VideoServerType.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('video_server_type_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = VideoServerType::query();
            $template = 'actionsTemplate';
            if (request('show_deleted') === 1) {
                if (! Gate::allows('video_server_type_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'video_server_types.id',
                'video_server_types.server_type',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'video_server_type_';
                $routeKey = 'admin.video_server_types';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('server_type', function ($row) {
                return $row->server_type ? $row->server_type : '';
            });

            $table->rawColumns(['actions', 'massDelete']);

            return $table->make(true);
        }

        return view('admin.video_server_types.index');
    }

    /**
     * Show the form for creating new VideoServerType.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('video_server_type_create')) {
            return abort(401);
        }

        return view('admin.video_server_types.create');
    }

    /**
     * Store a newly created VideoServerType in storage.
     *
     * @param  \App\Http\Requests\StoreVideoServerTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoServerTypesRequest $request)
    {
        if (! Gate::allows('video_server_type_create')) {
            return abort(401);
        }
        $video_server_type = VideoServerType::create($request->all());

        return redirect()->route('admin.video_server_types.index');
    }

    /**
     * Show the form for editing VideoServerType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('video_server_type_edit')) {
            return abort(401);
        }
        $video_server_type = VideoServerType::findOrFail($id);

        return view('admin.video_server_types.edit', compact('video_server_type'));
    }

    /**
     * Update VideoServerType in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoServerTypesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoServerTypesRequest $request, $id)
    {
        if (! Gate::allows('video_server_type_edit')) {
            return abort(401);
        }
        $video_server_type = VideoServerType::findOrFail($id);
        $video_server_type->update($request->all());

        return redirect()->route('admin.video_server_types.index');
    }

    /**
     * Display VideoServerType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('video_server_type_view')) {
            return abort(401);
        }
        $video_settings = \App\VideoSetting::where('video_server_type_id', $id)->get();

        $video_server_type = VideoServerType::findOrFail($id);

        return view('admin.video_server_types.show', compact('video_server_type', 'video_settings'));
    }

    /**
     * Remove VideoServerType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('video_server_type_delete')) {
            return abort(401);
        }
        $video_server_type = VideoServerType::findOrFail($id);
        $video_server_type->delete();

        return redirect()->route('admin.video_server_types.index');
    }

    /**
     * Delete all selected VideoServerType at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('video_server_type_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = VideoServerType::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Restore VideoServerType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('video_server_type_delete')) {
            return abort(401);
        }
        $video_server_type = VideoServerType::onlyTrashed()->findOrFail($id);
        $video_server_type->restore();

        return redirect()->route('admin.video_server_types.index');
    }

    /**
     * Permanently delete VideoServerType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('video_server_type_delete')) {
            return abort(401);
        }
        $video_server_type = VideoServerType::onlyTrashed()->findOrFail($id);
        $video_server_type->forceDelete();

        return redirect()->route('admin.video_server_types.index');
    }
}
