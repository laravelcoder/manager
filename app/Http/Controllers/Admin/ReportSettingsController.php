<?php

namespace App\Http\Controllers\Admin;

use App\ReportSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReportSettingsRequest;
use App\Http\Requests\Admin\UpdateReportSettingsRequest;
use Yajra\DataTables\DataTables;

class ReportSettingsController extends Controller
{
    /**
     * Display a listing of ReportSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('report_setting_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = ReportSetting::query();
            $query->with("country");
            $query->with("synce_server");
            $query->with("filters");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('report_setting_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'report_settings.id',
                'report_settings.millisecond_precision',
                'report_settings.show_channel_button',
                'report_settings.show_clip_button',
                'report_settings.show_group_button',
                'report_settings.show_live_button',
                'report_settings.enable_evt',
                'report_settings.enable_excel',
                'report_settings.enable_evt_timing',
                'report_settings.timezone',
                'report_settings.country_id',
                'report_settings.synce_server_id',
                'report_settings.filters_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'report_setting_';
                $routeKey = 'admin.report_settings';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('millisecond_precision', function ($row) {
                return \Form::checkbox("millisecond_precision", 1, $row->millisecond_precision == 1, ["disabled"]);
            });
            $table->editColumn('show_channel_button', function ($row) {
                return \Form::checkbox("show_channel_button", 1, $row->show_channel_button == 1, ["disabled"]);
            });
            $table->editColumn('show_clip_button', function ($row) {
                return \Form::checkbox("show_clip_button", 1, $row->show_clip_button == 1, ["disabled"]);
            });
            $table->editColumn('show_group_button', function ($row) {
                return \Form::checkbox("show_group_button", 1, $row->show_group_button == 1, ["disabled"]);
            });
            $table->editColumn('show_live_button', function ($row) {
                return \Form::checkbox("show_live_button", 1, $row->show_live_button == 1, ["disabled"]);
            });
            $table->editColumn('enable_evt', function ($row) {
                return \Form::checkbox("enable_evt", 1, $row->enable_evt == 1, ["disabled"]);
            });
            $table->editColumn('enable_excel', function ($row) {
                return \Form::checkbox("enable_excel", 1, $row->enable_excel == 1, ["disabled"]);
            });
            $table->editColumn('enable_evt_timing', function ($row) {
                return \Form::checkbox("enable_evt_timing", 1, $row->enable_evt_timing == 1, ["disabled"]);
            });
            $table->editColumn('timezone', function ($row) {
                return $row->timezone ? $row->timezone : '';
            });
            $table->editColumn('country.title', function ($row) {
                return $row->country ? $row->country->title : '';
            });
            $table->editColumn('synce_server.name', function ($row) {
                return $row->synce_server ? $row->synce_server->name : '';
            });
            $table->editColumn('filters.name', function ($row) {
                return $row->filters ? $row->filters->name : '';
            });

            $table->rawColumns(['actions','massDelete','millisecond_precision','show_channel_button','show_clip_button','show_group_button','show_live_button','enable_evt','enable_excel','enable_evt_timing']);

            return $table->make(true);
        }

        return view('admin.report_settings.index');
    }

    /**
     * Show the form for creating new ReportSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('report_setting_create')) {
            return abort(401);
        }
        
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $synce_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $filters = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.report_settings.create', compact('countries', 'synce_servers', 'filters'));
    }

    /**
     * Store a newly created ReportSetting in storage.
     *
     * @param  \App\Http\Requests\StoreReportSettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportSettingsRequest $request)
    {
        if (! Gate::allows('report_setting_create')) {
            return abort(401);
        }
        $report_setting = ReportSetting::create($request->all());



        return redirect()->route('admin.report_settings.index');
    }


    /**
     * Show the form for editing ReportSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('report_setting_edit')) {
            return abort(401);
        }
        
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $synce_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $filters = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $report_setting = ReportSetting::findOrFail($id);

        return view('admin.report_settings.edit', compact('report_setting', 'countries', 'synce_servers', 'filters'));
    }

    /**
     * Update ReportSetting in storage.
     *
     * @param  \App\Http\Requests\UpdateReportSettingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportSettingsRequest $request, $id)
    {
        if (! Gate::allows('report_setting_edit')) {
            return abort(401);
        }
        $report_setting = ReportSetting::findOrFail($id);
        $report_setting->update($request->all());



        return redirect()->route('admin.report_settings.index');
    }


    /**
     * Display ReportSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('report_setting_view')) {
            return abort(401);
        }
        $report_setting = ReportSetting::findOrFail($id);

        return view('admin.report_settings.show', compact('report_setting'));
    }


    /**
     * Remove ReportSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('report_setting_delete')) {
            return abort(401);
        }
        $report_setting = ReportSetting::findOrFail($id);
        $report_setting->delete();

        return redirect()->route('admin.report_settings.index');
    }

    /**
     * Delete all selected ReportSetting at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('report_setting_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ReportSetting::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ReportSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('report_setting_delete')) {
            return abort(401);
        }
        $report_setting = ReportSetting::onlyTrashed()->findOrFail($id);
        $report_setting->restore();

        return redirect()->route('admin.report_settings.index');
    }

    /**
     * Permanently delete ReportSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('report_setting_delete')) {
            return abort(401);
        }
        $report_setting = ReportSetting::onlyTrashed()->findOrFail($id);
        $report_setting->forceDelete();

        return redirect()->route('admin.report_settings.index');
    }
}
