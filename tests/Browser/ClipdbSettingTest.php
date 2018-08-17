<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ClipdbSettingTest extends DuskTestCase
{

    public function testCreateClipdbSetting()
    {
        $admin = \App\User::find(1);
        $clipdb_setting = factory('App\ClipdbSetting')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $clipdb_setting) {
            $browser->loginAs($admin)
                ->visit(route('admin.clipdb_settings.index'))
                ->clickLink('Add new')
                ->type("clip_db_url", $clipdb_setting->clip_db_url)
                ->press('Save')
                ->assertRouteIs('admin.clipdb_settings.index')
                ->assertSeeIn("tr:last-child td[field-key='clip_db_url']", $clipdb_setting->clip_db_url)
                ->logout();
        });
    }

    public function testEditClipdbSetting()
    {
        $admin = \App\User::find(1);
        $clipdb_setting = factory('App\ClipdbSetting')->create();
        $clipdb_setting2 = factory('App\ClipdbSetting')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $clipdb_setting, $clipdb_setting2) {
            $browser->loginAs($admin)
                ->visit(route('admin.clipdb_settings.index'))
                ->click('tr[data-entry-id="' . $clipdb_setting->id . '"] .btn-info')
                ->type("clip_db_url", $clipdb_setting2->clip_db_url)
                ->press('Update')
                ->assertRouteIs('admin.clipdb_settings.index')
                ->assertSeeIn("tr:last-child td[field-key='clip_db_url']", $clipdb_setting2->clip_db_url)
                ->logout();
        });
    }

    public function testShowClipdbSetting()
    {
        $admin = \App\User::find(1);
        $clipdb_setting = factory('App\ClipdbSetting')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $clipdb_setting) {
            $browser->loginAs($admin)
                ->visit(route('admin.clipdb_settings.index'))
                ->click('tr[data-entry-id="' . $clipdb_setting->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='clip_db_url']", $clipdb_setting->clip_db_url)
                ->logout();
        });
    }

}
