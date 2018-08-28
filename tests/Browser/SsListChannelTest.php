<?php

declare(strict_types=1);

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class SsListChannelTest extends DuskTestCase
{
    public function testCreateSsListChannel(): void
    {
        $admin = \App\User::find(1);
        $ss_list_channel = factory('App\SsListChannel')->make();

        $this->browse(function (Browser $browser) use ($admin, $ss_list_channel): void {
            $browser->loginAs($admin)
                ->visit(route('admin.ss_list_channels.index'))
                ->clickLink('Add new')
                ->select('sync_server_id', $ss_list_channel->sync_server_id)
                ->select('channel_id', $ss_list_channel->channel_id)
                ->press('Save')
                ->assertRouteIs('admin.ss_list_channels.index')
                ->assertSeeIn("tr:last-child td[field-key='sync_server']", $ss_list_channel->sync_server->name)
                ->assertSeeIn("tr:last-child td[field-key='channel']", $ss_list_channel->channel->channel_name)
                ->logout();
        });
    }

    public function testEditSsListChannel(): void
    {
        $admin = \App\User::find(1);
        $ss_list_channel = factory('App\SsListChannel')->create();
        $ss_list_channel2 = factory('App\SsListChannel')->make();

        $this->browse(function (Browser $browser) use ($admin, $ss_list_channel, $ss_list_channel2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.ss_list_channels.index'))
                ->click('tr[data-entry-id="'.$ss_list_channel->id.'"] .btn-info')
                ->select('sync_server_id', $ss_list_channel2->sync_server_id)
                ->select('channel_id', $ss_list_channel2->channel_id)
                ->press('Update')
                ->assertRouteIs('admin.ss_list_channels.index')
                ->assertSeeIn("tr:last-child td[field-key='sync_server']", $ss_list_channel2->sync_server->name)
                ->assertSeeIn("tr:last-child td[field-key='channel']", $ss_list_channel2->channel->channel_name)
                ->logout();
        });
    }

    public function testShowSsListChannel(): void
    {
        $admin = \App\User::find(1);
        $ss_list_channel = factory('App\SsListChannel')->create();

        $this->browse(function (Browser $browser) use ($admin, $ss_list_channel): void {
            $browser->loginAs($admin)
                ->visit(route('admin.ss_list_channels.index'))
                ->click('tr[data-entry-id="'.$ss_list_channel->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='sync_server']", $ss_list_channel->sync_server->name)
                ->assertSeeIn("td[field-key='channel']", $ss_list_channel->channel->channel_name)
                ->logout();
        });
    }
}
