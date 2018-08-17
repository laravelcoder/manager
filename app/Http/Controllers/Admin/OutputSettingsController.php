<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\OutputSetting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreOutputSettingsRequest;
use App\Http\Requests\Admin\UpdateOutputSettingsRequest;

class OutputSettingsController extends Controller
{
    /**
     * Display a listing of OutputSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('output_setting_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = OutputSetting::query();
            $query->with('email');
            $query->with('sync_server');
            $template = 'actionsTemplate';
            if (request('show_deleted') === 1) {
                if (! Gate::allows('output_setting_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'output_settings.id',
                'output_settings.report_time',
                'output_settings.email_id',
                'output_settings.sync_server_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'output_setting_';
                $routeKey = 'admin.output_settings';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('report_time', function ($row) {
                return $row->report_time ? $row->report_time : '';
            });
            $table->editColumn('email.email', function ($row) {
                return $row->email ? $row->email->email : '';
            });
            $table->editColumn('sync_server.name', function ($row) {
                return $row->sync_server ? $row->sync_server->name : '';
            });

            $table->rawColumns(['actions', 'massDelete']);

            return $table->make(true);
        }

        return view('admin.output_settings.index');
    }

    /**
     * Show the form for creating new OutputSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('output_setting_create')) {
            return abort(401);
        }

        $emails = \App\User::get()->pluck('email', 'id')->prepend(trans('global.app_please_select'), '');
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.output_settings.create', compact('emails', 'sync_servers'));
    }

    /**
     * Store a newly created OutputSetting in storage.
     *
     * @param  \App\Http\Requests\StoreOutputSettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOutputSettingsRequest $request)
    {
        if (! Gate::allows('output_setting_create')) {
            return abort(401);
        }
        $output_setting = OutputSetting::create($request->all());

        return redirect()->route('admin.output_settings.index');
    }

    /**
     * Show the form for editing OutputSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('output_setting_edit')) {
            return abort(401);
        }

        $emails = \App\User::get()->pluck('email', 'id')->prepend(trans('global.app_please_select'), '');
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $output_setting = OutputSetting::findOrFail($id);

        return view('admin.output_settings.edit', compact('output_setting', 'emails', 'sync_servers'));
    }

    /**
     * Update OutputSetting in storage.
     *
     * @param  \App\Http\Requests\UpdateOutputSettingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutputSettingsRequest $request, $id)
    {
        if (! Gate::allows('output_setting_edit')) {
            return abort(401);
        }
        $output_setting = OutputSetting::findOrFail($id);
        $output_setting->update($request->all());

        return redirect()->route('admin.output_settings.index');
    }

    /**
     * Display OutputSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('output_setting_view')) {
            return abort(401);
        }
        $output_setting = OutputSetting::findOrFail($id);

        return view('admin.output_settings.show', compact('output_setting'));
    }

    /**
     * Remove OutputSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('output_setting_delete')) {
            return abort(401);
        }
        $output_setting = OutputSetting::findOrFail($id);
        $output_setting->delete();

        return redirect()->route('admin.output_settings.index');
    }

    /**
     * Delete all selected OutputSetting at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('output_setting_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = OutputSetting::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Restore OutputSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('output_setting_delete')) {
            return abort(401);
        }
        $output_setting = OutputSetting::onlyTrashed()->findOrFail($id);
        $output_setting->restore();

        return redirect()->route('admin.output_settings.index');
    }

    /**
     * Permanently delete OutputSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('output_setting_delete')) {
            return abort(401);
        }
        $output_setting = OutputSetting::onlyTrashed()->findOrFail($id);
        $output_setting->forceDelete();

        return redirect()->route('admin.output_settings.index');
    }
}
