<?php

namespace App\Http\Controllers\Admin;

use App\RealtimeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRealtimeNotificationsRequest;
use App\Http\Requests\Admin\UpdateRealtimeNotificationsRequest;
use Yajra\DataTables\DataTables;

class RealtimeNotificationsController extends Controller
{
    /**
     * Display a listing of RealtimeNotification.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('realtime_notification_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = RealtimeNotification::query();
            $query->with("sync_server");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('realtime_notification_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'realtime_notifications.id',
                'realtime_notifications.server_type',
                'realtime_notifications.r_urltn',
                'realtime_notifications.sync_server_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'realtime_notification_';
                $routeKey = 'admin.realtime_notifications';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('server_type', function ($row) {
                return $row->server_type ? $row->server_type : '';
            });
            $table->editColumn('r_urltn', function ($row) {
                return $row->r_urltn ? $row->r_urltn : '';
            });
            $table->editColumn('sync_server.name', function ($row) {
                return $row->sync_server ? $row->sync_server->name : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.realtime_notifications.index');
    }

    /**
     * Show the form for creating new RealtimeNotification.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('realtime_notification_create')) {
            return abort(401);
        }
        
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_server_type = RealtimeNotification::$enum_server_type;
            
        return view('admin.realtime_notifications.create', compact('enum_server_type', 'sync_servers'));
    }

    /**
     * Store a newly created RealtimeNotification in storage.
     *
     * @param  \App\Http\Requests\StoreRealtimeNotificationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRealtimeNotificationsRequest $request)
    {
        if (! Gate::allows('realtime_notification_create')) {
            return abort(401);
        }
        $realtime_notification = RealtimeNotification::create($request->all());



        return redirect()->route('admin.realtime_notifications.index');
    }


    /**
     * Show the form for editing RealtimeNotification.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('realtime_notification_edit')) {
            return abort(401);
        }
        
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_server_type = RealtimeNotification::$enum_server_type;
            
        $realtime_notification = RealtimeNotification::findOrFail($id);

        return view('admin.realtime_notifications.edit', compact('realtime_notification', 'enum_server_type', 'sync_servers'));
    }

    /**
     * Update RealtimeNotification in storage.
     *
     * @param  \App\Http\Requests\UpdateRealtimeNotificationsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRealtimeNotificationsRequest $request, $id)
    {
        if (! Gate::allows('realtime_notification_edit')) {
            return abort(401);
        }
        $realtime_notification = RealtimeNotification::findOrFail($id);
        $realtime_notification->update($request->all());



        return redirect()->route('admin.realtime_notifications.index');
    }


    /**
     * Display RealtimeNotification.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('realtime_notification_view')) {
            return abort(401);
        }
        $realtime_notification = RealtimeNotification::findOrFail($id);

        return view('admin.realtime_notifications.show', compact('realtime_notification'));
    }


    /**
     * Remove RealtimeNotification from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('realtime_notification_delete')) {
            return abort(401);
        }
        $realtime_notification = RealtimeNotification::findOrFail($id);
        $realtime_notification->delete();

        return redirect()->route('admin.realtime_notifications.index');
    }

    /**
     * Delete all selected RealtimeNotification at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('realtime_notification_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = RealtimeNotification::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore RealtimeNotification from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('realtime_notification_delete')) {
            return abort(401);
        }
        $realtime_notification = RealtimeNotification::onlyTrashed()->findOrFail($id);
        $realtime_notification->restore();

        return redirect()->route('admin.realtime_notifications.index');
    }

    /**
     * Permanently delete RealtimeNotification from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('realtime_notification_delete')) {
            return abort(401);
        }
        $realtime_notification = RealtimeNotification::onlyTrashed()->findOrFail($id);
        $realtime_notification->forceDelete();

        return redirect()->route('admin.realtime_notifications.index');
    }
}
