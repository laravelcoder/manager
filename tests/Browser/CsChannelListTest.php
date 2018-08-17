<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CsChannelListTest extends DuskTestCase
{
    public function testCreateCsChannelList(): void
    {
        $admin = \App\User::find(1);
        $cs_channel_list = factory('App\CsChannelList')->make();

        $this->browse(function (Browser $browser) use ($admin, $cs_channel_list): void {
            $browser->loginAs($admin)
                ->visit(route('admin.cs_channel_lists.index'))
                ->clickLink('Add new')
                ->select('channel_server_id', $cs_channel_list->channel_server_id)
                ->type('channel_name', $cs_channel_list->channel_name)
                ->type('channel_type', $cs_channel_list->channel_type)
                ->press('Save')
                ->assertRouteIs('admin.cs_channel_lists.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $cs_channel_list->channel_server->name)
                ->assertSeeIn("tr:last-child td[field-key='channel_name']", $cs_channel_list->channel_name)
                ->assertSeeIn("tr:last-child td[field-key='channel_type']", $cs_channel_list->channel_type)
                ->logout();
        });
    }

    public function testEditCsChannelList(): void
    {
        $admin = \App\User::find(1);
        $cs_channel_list = factory('App\CsChannelList')->create();
        $cs_channel_list2 = factory('App\CsChannelList')->make();

        $this->browse(function (Browser $browser) use ($admin, $cs_channel_list, $cs_channel_list2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.cs_channel_lists.index'))
                ->click('tr[data-entry-id="'.$cs_channel_list->id.'"] .btn-info')
                ->select('channel_server_id', $cs_channel_list2->channel_server_id)
                ->type('channel_name', $cs_channel_list2->channel_name)
                ->type('channel_type', $cs_channel_list2->channel_type)
                ->press('Update')
                ->assertRouteIs('admin.cs_channel_lists.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $cs_channel_list2->channel_server->name)
                ->assertSeeIn("tr:last-child td[field-key='channel_name']", $cs_channel_list2->channel_name)
                ->assertSeeIn("tr:last-child td[field-key='channel_type']", $cs_channel_list2->channel_type)
                ->logout();
        });
    }

    public function testShowCsChannelList(): void
    {
        $admin = \App\User::find(1);
        $cs_channel_list = factory('App\CsChannelList')->create();

        $this->browse(function (Browser $browser) use ($admin, $cs_channel_list): void {
            $browser->loginAs($admin)
                ->visit(route('admin.cs_channel_lists.index'))
                ->click('tr[data-entry-id="'.$cs_channel_list->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='channel_server']", $cs_channel_list->channel_server->name)
                ->assertSeeIn("td[field-key='channel_name']", $cs_channel_list->channel_name)
                ->assertSeeIn("td[field-key='channel_type']", $cs_channel_list->channel_type)
                ->logout();
        });
    }
}
