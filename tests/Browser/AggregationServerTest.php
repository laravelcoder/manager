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
                ->press('Save')
                ->assertRouteIs('admin.aggregation_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='server_name']", $aggregation_server->server_name)
                ->assertSeeIn("tr:last-child td[field-key='server_host']", $aggregation_server->server_host)
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
                ->press('Update')
                ->assertRouteIs('admin.aggregation_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='server_name']", $aggregation_server2->server_name)
                ->assertSeeIn("tr:last-child td[field-key='server_host']", $aggregation_server2->server_host)
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
                ->logout();
        });
    }
}