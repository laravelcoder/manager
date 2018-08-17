<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace App\Http\Controllers\Api\V1;

use App\RealtimeNotification;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRealtimeNotificationsRequest;
use App\Http\Requests\Admin\UpdateRealtimeNotificationsRequest;

class RealtimeNotificationsController extends Controller
{
    public function index()
    {
        return RealtimeNotification::all();
    }

    public function show($id)
    {
        return RealtimeNotification::findOrFail($id);
    }

    public function update(UpdateRealtimeNotificationsRequest $request, $id)
    {
        $realtime_notification = RealtimeNotification::findOrFail($id);
        $realtime_notification->update($request->all());

        return $realtime_notification;
    }

    public function store(StoreRealtimeNotificationsRequest $request)
    {
        $realtime_notification = RealtimeNotification::create($request->all());

        return $realtime_notification;
    }

    public function destroy($id)
    {
        $realtime_notification = RealtimeNotification::findOrFail($id);
        $realtime_notification->delete();

        return '';
    }
}
