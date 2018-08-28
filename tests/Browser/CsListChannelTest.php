<?php

declare(strict_types=1);

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CsListChannelTest extends DuskTestCase
{
    public function testCreateCsListChannel(): void
    {
        $admin = \App\User::find(1);
        $cs_list_channel = factory('App\CsListChannel')->make();

        $this->browse(function (Browser $browser) use ($admin, $cs_list_channel): void {
            $browser->loginAs($admin)
                ->visit(route('admin.cs_list_channels.index'))
                ->clickLink('Add new')
                ->select('channel_id', $cs_list_channel->channel_id)
                ->select('channelserver_id', $cs_list_channel->channelserver_id)
                ->press('Save')
                ->assertRouteIs('admin.cs_list_channels.index')
                ->assertSeeIn("tr:last-child td[field-key='channel']", $cs_list_channel->channel->channel_name)
                ->assertSeeIn("tr:last-child td[field-key='channelserver']", $cs_list_channel->channelserver->name)
                ->logout();
        });
    }

    public function testEditCsListChannel(): void
    {
        $admin = \App\User::find(1);
        $cs_list_channel = factory('App\CsListChannel')->create();
        $cs_list_channel2 = factory('App\CsListChannel')->make();

        $this->browse(function (Browser $browser) use ($admin, $cs_list_channel, $cs_list_channel2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.cs_list_channels.index'))
                ->click('tr[data-entry-id="'.$cs_list_channel->id.'"] .btn-info')
                ->select('channel_id', $cs_list_channel2->channel_id)
                ->select('channelserver_id', $cs_list_channel2->channelserver_id)
                ->press('Update')
                ->assertRouteIs('admin.cs_list_channels.index')
                ->assertSeeIn("tr:last-child td[field-key='channel']", $cs_list_channel2->channel->channel_name)
                ->assertSeeIn("tr:last-child td[field-key='channelserver']", $cs_list_channel2->channelserver->name)
                ->logout();
        });
    }

    public function testShowCsListChannel(): void
    {
        $admin = \App\User::find(1);
        $cs_list_channel = factory('App\CsListChannel')->create();

        $this->browse(function (Browser $browser) use ($admin, $cs_list_channel): void {
            $browser->loginAs($admin)
                ->visit(route('admin.cs_list_channels.index'))
                ->click('tr[data-entry-id="'.$cs_list_channel->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='channel']", $cs_list_channel->channel->channel_name)
                ->assertSeeIn("td[field-key='channelserver']", $cs_list_channel->channelserver->name)
                ->logout();
        });
    }
}
