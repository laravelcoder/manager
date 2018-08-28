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
                ->select("sync_server_id", $video_setting->sync_server_id)
                ->select("video_server_type_id", $video_setting->video_server_type_id)
                ->press('Save')
                ->assertRouteIs('admin.video_settings.index')
                ->assertSeeIn("tr:last-child td[field-key='server_url']", $video_setting->server_url)
                ->assertSeeIn("tr:last-child td[field-key='server_redirect']", $video_setting->server_redirect)
                ->assertSeeIn("tr:last-child td[field-key='hls']", $video_setting->hls)
                ->assertSeeIn("tr:last-child td[field-key='sync_server']", $video_setting->sync_server->name)
                ->assertSeeIn("tr:last-child td[field-key='video_server_type']", $video_setting->video_server_type->server_type)
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
                ->select("sync_server_id", $video_setting2->sync_server_id)
                ->select("video_server_type_id", $video_setting2->video_server_type_id)
                ->press('Update')
                ->assertRouteIs('admin.video_settings.index')
                ->assertSeeIn("tr:last-child td[field-key='server_url']", $video_setting2->server_url)
                ->assertSeeIn("tr:last-child td[field-key='server_redirect']", $video_setting2->server_redirect)
                ->assertSeeIn("tr:last-child td[field-key='hls']", $video_setting2->hls)
                ->assertSeeIn("tr:last-child td[field-key='sync_server']", $video_setting2->sync_server->name)
                ->assertSeeIn("tr:last-child td[field-key='video_server_type']", $video_setting2->video_server_type->server_type)
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
                ->assertSeeIn("td[field-key='sync_server']", $video_setting->sync_server->name)
                ->assertSeeIn("td[field-key='video_server_type']", $video_setting->video_server_type->server_type)
                ->logout();
        });
    }

}
