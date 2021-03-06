<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\GeneralSetting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreGeneralSettingsRequest;
use App\Http\Requests\Admin\UpdateGeneralSettingsRequest;

class GeneralSettingsController extends Controller
{
    /**
     * Display a listing of GeneralSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('general_setting_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = GeneralSetting::query();
            $query->with('sync_server');
            $template = 'actionsTemplate';
            if (request('show_deleted') === 1) {
                if (! Gate::allows('general_setting_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'general_settings.id',
                'general_settings.transcoding_server',
                'general_settings.sync_server_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'general_setting_';
                $routeKey = 'admin.general_settings';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('transcoding_server', function ($row) {
                return $row->transcoding_server ? $row->transcoding_server : '';
            });
            $table->editColumn('sync_server.name', function ($row) {
                return $row->sync_server ? $row->sync_server->name : '';
            });

            $table->rawColumns(['actions', 'massDelete']);

            return $table->make(true);
        }

        return view('admin.general_settings.index');
    }

    /**
     * Show the form for creating new GeneralSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('general_setting_create')) {
            return abort(401);
        }

        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.general_settings.create', compact('sync_servers'));
    }

    /**
     * Store a newly created GeneralSetting in storage.
     *
     * @param  \App\Http\Requests\StoreGeneralSettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGeneralSettingsRequest $request)
    {
        if (! Gate::allows('general_setting_create')) {
            return abort(401);
        }
        $general_setting = GeneralSetting::create($request->all());

        return redirect()->route('admin.general_settings.index');
    }

    /**
     * Show the form for editing GeneralSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('general_setting_edit')) {
            return abort(401);
        }

        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $general_setting = GeneralSetting::findOrFail($id);

        return view('admin.general_settings.edit', compact('general_setting', 'sync_servers'));
    }

    /**
     * Update GeneralSetting in storage.
     *
     * @param  \App\Http\Requests\UpdateGeneralSettingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGeneralSettingsRequest $request, $id)
    {
        if (! Gate::allows('general_setting_edit')) {
            return abort(401);
        }
        $general_setting = GeneralSetting::findOrFail($id);
        $general_setting->update($request->all());

        return redirect()->route('admin.general_settings.index');
    }

    /**
     * Display GeneralSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('general_setting_view')) {
            return abort(401);
        }
        $general_setting = GeneralSetting::findOrFail($id);

        return view('admin.general_settings.show', compact('general_setting'));
    }

    /**
     * Remove GeneralSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('general_setting_delete')) {
            return abort(401);
        }
        $general_setting = GeneralSetting::findOrFail($id);
        $general_setting->delete();

        return redirect()->route('admin.general_settings.index');
    }

    /**
     * Delete all selected GeneralSetting at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('general_setting_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = GeneralSetting::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Restore GeneralSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('general_setting_delete')) {
            return abort(401);
        }
        $general_setting = GeneralSetting::onlyTrashed()->findOrFail($id);
        $general_setting->restore();

        return redirect()->route('admin.general_settings.index');
    }

    /**
     * Permanently delete GeneralSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('general_setting_delete')) {
            return abort(401);
        }
        $general_setting = GeneralSetting::onlyTrashed()->findOrFail($id);
        $general_setting->forceDelete();

        return redirect()->route('admin.general_settings.index');
    }
}
