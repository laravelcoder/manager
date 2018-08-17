<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class FilterTest extends DuskTestCase
{

    public function testCreateFilter()
    {
        $admin = \App\User::find(1);
        $filter = factory('App\Filter')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $filter) {
            $browser->loginAs($admin)
                ->visit(route('admin.filters.index'))
                ->clickLink('Add new')
                ->type("name", $filter->name)
                ->press('Save')
                ->assertRouteIs('admin.filters.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $filter->name)
                ->logout();
        });
    }

    public function testEditFilter()
    {
        $admin = \App\User::find(1);
        $filter = factory('App\Filter')->create();
        $filter2 = factory('App\Filter')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $filter, $filter2) {
            $browser->loginAs($admin)
                ->visit(route('admin.filters.index'))
                ->click('tr[data-entry-id="' . $filter->id . '"] .btn-info')
                ->type("name", $filter2->name)
                ->press('Update')
                ->assertRouteIs('admin.filters.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $filter2->name)
                ->logout();
        });
    }

    public function testShowFilter()
    {
        $admin = \App\User::find(1);
        $filter = factory('App\Filter')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $filter) {
            $browser->loginAs($admin)
                ->visit(route('admin.filters.index'))
                ->click('tr[data-entry-id="' . $filter->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $filter->name)
                ->logout();
        });
    }

}
