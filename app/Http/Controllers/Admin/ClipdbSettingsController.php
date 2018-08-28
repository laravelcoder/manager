<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\ClipdbSetting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreClipdbSettingsRequest;
use App\Http\Requests\Admin\UpdateClipdbSettingsRequest;

class ClipdbSettingsController extends Controller
{
    /**
     * Display a listing of ClipdbSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('clipdb_setting_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = ClipdbSetting::query();
            $template = 'actionsTemplate';
            if (request('show_deleted') === 1) {
                if (! Gate::allows('clipdb_setting_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'clipdb_settings.id',
                'clipdb_settings.clip_db_url',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'clipdb_setting_';
                $routeKey = 'admin.clipdb_settings';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('clip_db_url', function ($row) {
                return $row->clip_db_url ? $row->clip_db_url : '';
            });

            $table->rawColumns(['actions', 'massDelete']);

            return $table->make(true);
        }

        return view('admin.clipdb_settings.index');
    }

    /**
     * Show the form for creating new ClipdbSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('clipdb_setting_create')) {
            return abort(401);
        }

        return view('admin.clipdb_settings.create');
    }

    /**
     * Store a newly created ClipdbSetting in storage.
     *
     * @param  \App\Http\Requests\StoreClipdbSettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClipdbSettingsRequest $request)
    {
        if (! Gate::allows('clipdb_setting_create')) {
            return abort(401);
        }
        $clipdb_setting = ClipdbSetting::create($request->all());

        return redirect()->route('admin.clipdb_settings.index');
    }

    /**
     * Show the form for editing ClipdbSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('clipdb_setting_edit')) {
            return abort(401);
        }
        $clipdb_setting = ClipdbSetting::findOrFail($id);

        return view('admin.clipdb_settings.edit', compact('clipdb_setting'));
    }

    /**
     * Update ClipdbSetting in storage.
     *
     * @param  \App\Http\Requests\UpdateClipdbSettingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClipdbSettingsRequest $request, $id)
    {
        if (! Gate::allows('clipdb_setting_edit')) {
            return abort(401);
        }
        $clipdb_setting = ClipdbSetting::findOrFail($id);
        $clipdb_setting->update($request->all());

        return redirect()->route('admin.clipdb_settings.index');
    }

    /**
     * Display ClipdbSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('clipdb_setting_view')) {
            return abort(401);
        }
        $clipdb_setting = ClipdbSetting::findOrFail($id);

        return view('admin.clipdb_settings.show', compact('clipdb_setting'));
    }

    /**
     * Remove ClipdbSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('clipdb_setting_delete')) {
            return abort(401);
        }
        $clipdb_setting = ClipdbSetting::findOrFail($id);
        $clipdb_setting->delete();

        return redirect()->route('admin.clipdb_settings.index');
    }

    /**
     * Delete all selected ClipdbSetting at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('clipdb_setting_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ClipdbSetting::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Restore ClipdbSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('clipdb_setting_delete')) {
            return abort(401);
        }
        $clipdb_setting = ClipdbSetting::onlyTrashed()->findOrFail($id);
        $clipdb_setting->restore();

        return redirect()->route('admin.clipdb_settings.index');
    }

    /**
     * Permanently delete ClipdbSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('clipdb_setting_delete')) {
            return abort(401);
        }
        $clipdb_setting = ClipdbSetting::onlyTrashed()->findOrFail($id);
        $clipdb_setting->forceDelete();

        return redirect()->route('admin.clipdb_settings.index');
    }
}
