<?php

declare(strict_types=1);

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class FilterTest extends DuskTestCase
{
    public function testCreateFilter(): void
    {
        $admin = \App\User::find(1);
        $filter = factory('App\Filter')->make();

        $this->browse(function (Browser $browser) use ($admin, $filter): void {
            $browser->loginAs($admin)
                ->visit(route('admin.filters.index'))
                ->clickLink('Add new')
                ->type('name', $filter->name)
                ->select('sync_server_id', $filter->sync_server_id)
                ->press('Save')
                ->assertRouteIs('admin.filters.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $filter->name)
                ->assertSeeIn("tr:last-child td[field-key='sync_server']", $filter->sync_server->name)
                ->logout();
        });
    }

    public function testEditFilter(): void
    {
        $admin = \App\User::find(1);
        $filter = factory('App\Filter')->create();
        $filter2 = factory('App\Filter')->make();

        $this->browse(function (Browser $browser) use ($admin, $filter, $filter2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.filters.index'))
                ->click('tr[data-entry-id="'.$filter->id.'"] .btn-info')
                ->type('name', $filter2->name)
                ->select('sync_server_id', $filter2->sync_server_id)
                ->press('Update')
                ->assertRouteIs('admin.filters.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $filter2->name)
                ->assertSeeIn("tr:last-child td[field-key='sync_server']", $filter2->sync_server->name)
                ->logout();
        });
    }

    public function testShowFilter(): void
    {
        $admin = \App\User::find(1);
        $filter = factory('App\Filter')->create();

        $this->browse(function (Browser $browser) use ($admin, $filter): void {
            $browser->loginAs($admin)
                ->visit(route('admin.filters.index'))
                ->click('tr[data-entry-id="'.$filter->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $filter->name)
                ->assertSeeIn("td[field-key='sync_server']", $filter->sync_server->name)
                ->logout();
        });
    }
}
