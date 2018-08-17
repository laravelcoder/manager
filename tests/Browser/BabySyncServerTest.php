<?php

declare(strict_types=1);

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class BabySyncServerTest extends DuskTestCase
{
    public function testCreateBabySyncServer(): void
    {
        $admin = \App\User::find(1);
        $baby_sync_server = factory('App\BabySyncServer')->make();

        $this->browse(function (Browser $browser) use ($admin, $baby_sync_server): void {
            $browser->loginAs($admin)
                ->visit(route('admin.baby_sync_servers.index'))
                ->clickLink('Add new')
                ->type('baby_sync_server', $baby_sync_server->baby_sync_server)
                ->select('parent_aggregation_server_id', $baby_sync_server->parent_aggregation_server_id)
                ->press('Save')
                ->assertRouteIs('admin.baby_sync_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='baby_sync_server']", $baby_sync_server->baby_sync_server)
                ->assertSeeIn("tr:last-child td[field-key='parent_aggregation_server']", $baby_sync_server->parent_aggregation_server->server_name)
                ->logout();
        });
    }

    public function testEditBabySyncServer(): void
    {
        $admin = \App\User::find(1);
        $baby_sync_server = factory('App\BabySyncServer')->create();
        $baby_sync_server2 = factory('App\BabySyncServer')->make();

        $this->browse(function (Browser $browser) use ($admin, $baby_sync_server, $baby_sync_server2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.baby_sync_servers.index'))
                ->click('tr[data-entry-id="'.$baby_sync_server->id.'"] .btn-info')
                ->type('baby_sync_server', $baby_sync_server2->baby_sync_server)
                ->select('parent_aggregation_server_id', $baby_sync_server2->parent_aggregation_server_id)
                ->press('Update')
                ->assertRouteIs('admin.baby_sync_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='baby_sync_server']", $baby_sync_server2->baby_sync_server)
                ->assertSeeIn("tr:last-child td[field-key='parent_aggregation_server']", $baby_sync_server2->parent_aggregation_server->server_name)
                ->logout();
        });
    }

    public function testShowBabySyncServer(): void
    {
        $admin = \App\User::find(1);
        $baby_sync_server = factory('App\BabySyncServer')->create();

        $this->browse(function (Browser $browser) use ($admin, $baby_sync_server): void {
            $browser->loginAs($admin)
                ->visit(route('admin.baby_sync_servers.index'))
                ->click('tr[data-entry-id="'.$baby_sync_server->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='baby_sync_server']", $baby_sync_server->baby_sync_server)
                ->assertSeeIn("td[field-key='parent_aggregation_server']", $baby_sync_server->parent_aggregation_server->server_name)
                ->logout();
        });
    }
}
