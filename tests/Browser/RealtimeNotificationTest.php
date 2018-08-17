<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class RealtimeNotificationTest extends DuskTestCase
{
    public function testCreateRealtimeNotification(): void
    {
        $admin = \App\User::find(1);
        $realtime_notification = factory('App\RealtimeNotification')->make();

        $this->browse(function (Browser $browser) use ($admin, $realtime_notification): void {
            $browser->loginAs($admin)
                ->visit(route('admin.realtime_notifications.index'))
                ->clickLink('Add new')
                ->select('server_type', $realtime_notification->server_type)
                ->type('r_urltn', $realtime_notification->r_urltn)
                ->select('sync_server_id', $realtime_notification->sync_server_id)
                ->press('Save')
                ->assertRouteIs('admin.realtime_notifications.index')
                ->assertSeeIn("tr:last-child td[field-key='server_type']", $realtime_notification->server_type)
                ->assertSeeIn("tr:last-child td[field-key='r_urltn']", $realtime_notification->r_urltn)
                ->logout();
        });
    }

    public function testEditRealtimeNotification(): void
    {
        $admin = \App\User::find(1);
        $realtime_notification = factory('App\RealtimeNotification')->create();
        $realtime_notification2 = factory('App\RealtimeNotification')->make();

        $this->browse(function (Browser $browser) use ($admin, $realtime_notification, $realtime_notification2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.realtime_notifications.index'))
                ->click('tr[data-entry-id="'.$realtime_notification->id.'"] .btn-info')
                ->select('server_type', $realtime_notification2->server_type)
                ->type('r_urltn', $realtime_notification2->r_urltn)
                ->select('sync_server_id', $realtime_notification2->sync_server_id)
                ->press('Update')
                ->assertRouteIs('admin.realtime_notifications.index')
                ->assertSeeIn("tr:last-child td[field-key='server_type']", $realtime_notification2->server_type)
                ->assertSeeIn("tr:last-child td[field-key='r_urltn']", $realtime_notification2->r_urltn)
                ->logout();
        });
    }

    public function testShowRealtimeNotification(): void
    {
        $admin = \App\User::find(1);
        $realtime_notification = factory('App\RealtimeNotification')->create();

        $this->browse(function (Browser $browser) use ($admin, $realtime_notification): void {
            $browser->loginAs($admin)
                ->visit(route('admin.realtime_notifications.index'))
                ->click('tr[data-entry-id="'.$realtime_notification->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='server_type']", $realtime_notification->server_type)
                ->assertSeeIn("td[field-key='r_urltn']", $realtime_notification->r_urltn)
                ->assertSeeIn("td[field-key='sync_server']", $realtime_notification->sync_server->name)
                ->logout();
        });
    }
}
