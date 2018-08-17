<?php

declare(strict_types=1);

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CountryTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateCountry(): void
    {
        $admin = \App\User::find(1);
        $country = factory('App\Country')->make();

        $this->browse(function (Browser $browser) use ($admin, $country): void {
            $browser->loginAs($admin)
                ->visit(route('admin.countries.index'))
                ->clickLink('Add new')
                ->type('shortcode', $country->shortcode)
                ->type('title', $country->title)
                ->press('Save')
                ->assertRouteIs('admin.countries.index')
                ->assertSeeIn("tr:last-child td[field-key='shortcode']", $country->shortcode)
                ->assertSeeIn("tr:last-child td[field-key='title']", $country->title);
        });
    }

    public function testEditCountry(): void
    {
        $admin = \App\User::find(1);
        $country = factory('App\Country')->create();
        $country2 = factory('App\Country')->make();

        $this->browse(function (Browser $browser) use ($admin, $country, $country2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.countries.index'))
                ->click('tr[data-entry-id="'.$country->id.'"] .btn-info')
                ->type('shortcode', $country2->shortcode)
                ->type('title', $country2->title)
                ->press('Update')
                ->assertRouteIs('admin.countries.index')
                ->assertSeeIn("tr:last-child td[field-key='shortcode']", $country2->shortcode)
                ->assertSeeIn("tr:last-child td[field-key='title']", $country2->title);
        });
    }

    public function testShowCountry(): void
    {
        $admin = \App\User::find(1);
        $country = factory('App\Country')->create();

        $this->browse(function (Browser $browser) use ($admin, $country): void {
            $browser->loginAs($admin)
                ->visit(route('admin.countries.index'))
                ->click('tr[data-entry-id="'.$country->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='shortcode']", $country->shortcode)
                ->assertSeeIn("td[field-key='title']", $country->title);
        });
    }
}
