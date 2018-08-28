<?php

declare(strict_types=1);

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class AggregationServerTest extends DuskTestCase
{
    public function testCreateAggregationServer(): void
    {
        $admin = \App\User::find(1);
        $aggregation_server = factory('App\AggregationServer')->make();

        $this->browse(function (Browser $browser) use ($admin, $aggregation_server): void {
            $browser->loginAs($admin)
                ->visit(route('admin.aggregation_servers.index'))
                ->clickLink('Add new')
                ->type('server_name', $aggregation_server->server_name)
                ->type('server_host', $aggregation_server->server_host)
                ->select('sync_server_id', $aggregation_server->sync_server_id)
                ->press('Save')
                ->assertRouteIs('admin.aggregation_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='server_name']", $aggregation_server->server_name)
                ->assertSeeIn("tr:last-child td[field-key='server_host']", $aggregation_server->server_host)
                ->assertSeeIn("tr:last-child td[field-key='sync_server']", $aggregation_server->sync_server->name)
                ->logout();
        });
    }

    public function testEditAggregationServer(): void
    {
        $admin = \App\User::find(1);
        $aggregation_server = factory('App\AggregationServer')->create();
        $aggregation_server2 = factory('App\AggregationServer')->make();

        $this->browse(function (Browser $browser) use ($admin, $aggregation_server, $aggregation_server2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.aggregation_servers.index'))
                ->click('tr[data-entry-id="'.$aggregation_server->id.'"] .btn-info')
                ->type('server_name', $aggregation_server2->server_name)
                ->type('server_host', $aggregation_server2->server_host)
                ->select('sync_server_id', $aggregation_server2->sync_server_id)
                ->press('Update')
                ->assertRouteIs('admin.aggregation_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='server_name']", $aggregation_server2->server_name)
                ->assertSeeIn("tr:last-child td[field-key='server_host']", $aggregation_server2->server_host)
                ->assertSeeIn("tr:last-child td[field-key='sync_server']", $aggregation_server2->sync_server->name)
                ->logout();
        });
    }

    public function testShowAggregationServer(): void
    {
        $admin = \App\User::find(1);
        $aggregation_server = factory('App\AggregationServer')->create();

        $this->browse(function (Browser $browser) use ($admin, $aggregation_server): void {
            $browser->loginAs($admin)
                ->visit(route('admin.aggregation_servers.index'))
                ->click('tr[data-entry-id="'.$aggregation_server->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='server_name']", $aggregation_server->server_name)
                ->assertSeeIn("td[field-key='server_host']", $aggregation_server->server_host)
                ->assertSeeIn("td[field-key='sync_server']", $aggregation_server->sync_server->name)
                ->logout();
        });
    }
}
