<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class GeneralSettingTest extends DuskTestCase
{
    public function testCreateGeneralSetting(): void
    {
        $admin = \App\User::find(1);
        $general_setting = factory('App\GeneralSetting')->make();

        $this->browse(function (Browser $browser) use ($admin, $general_setting): void {
            $browser->loginAs($admin)
                ->visit(route('admin.general_settings.index'))
                ->clickLink('Add new')
                ->type('transcoding_server', $general_setting->transcoding_server)
                ->select('sync_server_id', $general_setting->sync_server_id)
                ->press('Save')
                ->assertRouteIs('admin.general_settings.index')
                ->assertSeeIn("tr:last-child td[field-key='transcoding_server']", $general_setting->transcoding_server)
                ->logout();
        });
    }

    public function testEditGeneralSetting(): void
    {
        $admin = \App\User::find(1);
        $general_setting = factory('App\GeneralSetting')->create();
        $general_setting2 = factory('App\GeneralSetting')->make();

        $this->browse(function (Browser $browser) use ($admin, $general_setting, $general_setting2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.general_settings.index'))
                ->click('tr[data-entry-id="'.$general_setting->id.'"] .btn-info')
                ->type('transcoding_server', $general_setting2->transcoding_server)
                ->select('sync_server_id', $general_setting2->sync_server_id)
                ->press('Update')
                ->assertRouteIs('admin.general_settings.index')
                ->assertSeeIn("tr:last-child td[field-key='transcoding_server']", $general_setting2->transcoding_server)
                ->logout();
        });
    }

    public function testShowGeneralSetting(): void
    {
        $admin = \App\User::find(1);
        $general_setting = factory('App\GeneralSetting')->create();

        $this->browse(function (Browser $browser) use ($admin, $general_setting): void {
            $browser->loginAs($admin)
                ->visit(route('admin.general_settings.index'))
                ->click('tr[data-entry-id="'.$general_setting->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='transcoding_server']", $general_setting->transcoding_server)
                ->assertSeeIn("td[field-key='sync_server']", $general_setting->sync_server->name)
                ->logout();
        });
    }
}
