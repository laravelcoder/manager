<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class VideoSettingTest extends DuskTestCase
{

    public function testCreateVideoSetting()
    {
        $admin = \App\User::find(1);
        $video_setting = factory('App\VideoSetting')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $video_setting) {
            $browser->loginAs($admin)
                ->visit(route('admin.video_settings.index'))
                ->clickLink('Add new')
                ->type("server_url", $video_setting->server_url)
                ->type("server_redirect", $video_setting->server_redirect)
                ->type("hls", $video_setting->hls)
                ->press('Save')
                ->assertRouteIs('admin.video_settings.index')
                ->assertSeeIn("tr:last-child td[field-key='server_url']", $video_setting->server_url)
                ->assertSeeIn("tr:last-child td[field-key='server_redirect']", $video_setting->server_redirect)
                ->assertSeeIn("tr:last-child td[field-key='hls']", $video_setting->hls)
                ->logout();
        });
    }

    public function testEditVideoSetting()
    {
        $admin = \App\User::find(1);
        $video_setting = factory('App\VideoSetting')->create();
        $video_setting2 = factory('App\VideoSetting')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $video_setting, $video_setting2) {
            $browser->loginAs($admin)
                ->visit(route('admin.video_settings.index'))
                ->click('tr[data-entry-id="' . $video_setting->id . '"] .btn-info')
                ->type("server_url", $video_setting2->server_url)
                ->type("server_redirect", $video_setting2->server_redirect)
                ->type("hls", $video_setting2->hls)
                ->press('Update')
                ->assertRouteIs('admin.video_settings.index')
                ->assertSeeIn("tr:last-child td[field-key='server_url']", $video_setting2->server_url)
                ->assertSeeIn("tr:last-child td[field-key='server_redirect']", $video_setting2->server_redirect)
                ->assertSeeIn("tr:last-child td[field-key='hls']", $video_setting2->hls)
                ->logout();
        });
    }

    public function testShowVideoSetting()
    {
        $admin = \App\User::find(1);
        $video_setting = factory('App\VideoSetting')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $video_setting) {
            $browser->loginAs($admin)
                ->visit(route('admin.video_settings.index'))
                ->click('tr[data-entry-id="' . $video_setting->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='server_url']", $video_setting->server_url)
                ->assertSeeIn("td[field-key='server_redirect']", $video_setting->server_redirect)
                ->assertSeeIn("td[field-key='hls']", $video_setting->hls)
                ->logout();
        });
    }

}
