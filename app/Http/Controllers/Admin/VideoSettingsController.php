<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\VideoSetting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreVideoSettingsRequest;
use App\Http\Requests\Admin\UpdateVideoSettingsRequest;

class VideoSettingsController extends Controller
{
    /**
     * Display a listing of VideoSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('video_setting_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = VideoSetting::query();
            $query->with('sync_server');
            $query->with('video_server_type');
            $template = 'actionsTemplate';

            $query->select([
                'video_settings.id',
                'video_settings.server_url',
                'video_settings.server_redirect',
                'video_settings.hls',
                'video_settings.sync_server_id',
                'video_settings.video_server_type_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'video_setting_';
                $routeKey = 'admin.video_settings';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('server_url', function ($row) {
                return $row->server_url ? $row->server_url : '';
            });
            $table->editColumn('server_redirect', function ($row) {
                return $row->server_redirect ? $row->server_redirect : '';
            });
            $table->editColumn('hls', function ($row) {
                return $row->hls ? $row->hls : '';
            });
            $table->editColumn('sync_server.name', function ($row) {
                return $row->sync_server ? $row->sync_server->name : '';
            });
            $table->editColumn('video_server_type.server_type', function ($row) {
                return $row->video_server_type ? $row->video_server_type->server_type : '';
            });

            $table->rawColumns(['actions', 'massDelete']);

            return $table->make(true);
        }

        return view('admin.video_settings.index');
    }

    /**
     * Show the form for creating new VideoSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('video_setting_create')) {
            return abort(401);
        }

        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('server_type', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.video_settings.create', compact('sync_servers', 'video_server_types'));
    }

    /**
     * Store a newly created VideoSetting in storage.
     *
     * @param  \App\Http\Requests\StoreVideoSettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoSettingsRequest $request)
    {
        if (! Gate::allows('video_setting_create')) {
            return abort(401);
        }
        $video_setting = VideoSetting::create($request->all());

        return redirect()->route('admin.video_settings.index');
    }

    /**
     * Show the form for editing VideoSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('video_setting_edit')) {
            return abort(401);
        }

        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('server_type', 'id')->prepend(trans('global.app_please_select'), '');

        $video_setting = VideoSetting::findOrFail($id);

        return view('admin.video_settings.edit', compact('video_setting', 'sync_servers', 'video_server_types'));
    }

    /**
     * Update VideoSetting in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoSettingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoSettingsRequest $request, $id)
    {
        if (! Gate::allows('video_setting_edit')) {
            return abort(401);
        }
        $video_setting = VideoSetting::findOrFail($id);
        $video_setting->update($request->all());

        return redirect()->route('admin.video_settings.index');
    }

    /**
     * Display VideoSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('video_setting_view')) {
            return abort(401);
        }
        $video_setting = VideoSetting::findOrFail($id);

        return view('admin.video_settings.show', compact('video_setting'));
    }

    /**
     * Remove VideoSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('video_setting_delete')) {
            return abort(401);
        }
        $video_setting = VideoSetting::findOrFail($id);
        $video_setting->delete();

        return redirect()->route('admin.video_settings.index');
    }

    /**
     * Delete all selected VideoSetting at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('video_setting_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = VideoSetting::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
