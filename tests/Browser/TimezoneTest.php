<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class TimezoneTest extends DuskTestCase
{
    public function testCreateTimezone(): void
    {
        $admin = \App\User::find(1);
        $timezone = factory('App\Timezone')->make();

        $this->browse(function (Browser $browser) use ($admin, $timezone): void {
            $browser->loginAs($admin)
                ->visit(route('admin.timezones.index'))
                ->clickLink('Add new')
                ->type('timezone', $timezone->timezone)
                ->press('Save')
                ->assertRouteIs('admin.timezones.index')
                ->assertSeeIn("tr:last-child td[field-key='timezone']", $timezone->timezone)
                ->logout();
        });
    }

    public function testEditTimezone(): void
    {
        $admin = \App\User::find(1);
        $timezone = factory('App\Timezone')->create();
        $timezone2 = factory('App\Timezone')->make();

        $this->browse(function (Browser $browser) use ($admin, $timezone, $timezone2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.timezones.index'))
                ->click('tr[data-entry-id="'.$timezone->id.'"] .btn-info')
                ->type('timezone', $timezone2->timezone)
                ->press('Update')
                ->assertRouteIs('admin.timezones.index')
                ->assertSeeIn("tr:last-child td[field-key='timezone']", $timezone2->timezone)
                ->logout();
        });
    }

    public function testShowTimezone(): void
    {
        $admin = \App\User::find(1);
        $timezone = factory('App\Timezone')->create();

        $this->browse(function (Browser $browser) use ($admin, $timezone): void {
            $browser->loginAs($admin)
                ->visit(route('admin.timezones.index'))
                ->click('tr[data-entry-id="'.$timezone->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='timezone']", $timezone->timezone)
                ->logout();
        });
    }
}
