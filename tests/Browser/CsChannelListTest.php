<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CsChannelListTest extends DuskTestCase
{

    public function testCreateCsChannelList()
    {
        $admin = \App\User::find(1);
        $cs_channel_list = factory('App\CsChannelList')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $cs_channel_list) {
            $browser->loginAs($admin)
                ->visit(route('admin.cs_channel_lists.index'))
                ->clickLink('Add new')
                ->type("channel_name", $cs_channel_list->channel_name)
                ->type("channel_type", $cs_channel_list->channel_type)
                ->select("channel_server_id", $cs_channel_list->channel_server_id)
                ->select("sync_server_id", $cs_channel_list->sync_server_id)
                ->press('Save')
                ->assertRouteIs('admin.cs_channel_lists.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_name']", $cs_channel_list->channel_name)
                ->assertSeeIn("tr:last-child td[field-key='channel_type']", $cs_channel_list->channel_type)
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $cs_channel_list->channel_server->name)
                ->assertSeeIn("tr:last-child td[field-key='sync_server']", $cs_channel_list->sync_server->name)
                ->logout();
        });
    }

    public function testEditCsChannelList()
    {
        $admin = \App\User::find(1);
        $cs_channel_list = factory('App\CsChannelList')->create();
        $cs_channel_list2 = factory('App\CsChannelList')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $cs_channel_list, $cs_channel_list2) {
            $browser->loginAs($admin)
                ->visit(route('admin.cs_channel_lists.index'))
                ->click('tr[data-entry-id="' . $cs_channel_list->id . '"] .btn-info')
                ->type("channel_name", $cs_channel_list2->channel_name)
                ->type("channel_type", $cs_channel_list2->channel_type)
                ->select("channel_server_id", $cs_channel_list2->channel_server_id)
                ->select("sync_server_id", $cs_channel_list2->sync_server_id)
                ->press('Update')
                ->assertRouteIs('admin.cs_channel_lists.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_name']", $cs_channel_list2->channel_name)
                ->assertSeeIn("tr:last-child td[field-key='channel_type']", $cs_channel_list2->channel_type)
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $cs_channel_list2->channel_server->name)
                ->assertSeeIn("tr:last-child td[field-key='sync_server']", $cs_channel_list2->sync_server->name)
                ->logout();
        });
    }

    public function testShowCsChannelList()
    {
        $admin = \App\User::find(1);
        $cs_channel_list = factory('App\CsChannelList')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $cs_channel_list) {
            $browser->loginAs($admin)
                ->visit(route('admin.cs_channel_lists.index'))
                ->click('tr[data-entry-id="' . $cs_channel_list->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='channel_name']", $cs_channel_list->channel_name)
                ->assertSeeIn("td[field-key='channel_type']", $cs_channel_list->channel_type)
                ->assertSeeIn("td[field-key='channel_server']", $cs_channel_list->channel_server->name)
                ->assertSeeIn("td[field-key='sync_server']", $cs_channel_list->sync_server->name)
                ->logout();
        });
    }

}
