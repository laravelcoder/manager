<?php

declare(strict_types=1);

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ChannelsListTest extends DuskTestCase
{
    public function testCreateChannelsList(): void
    {
        $admin = \App\User::find(1);
        $channels_list = factory('App\ChannelsList')->make();

        $this->browse(function (Browser $browser) use ($admin, $channels_list): void {
            $browser->loginAs($admin)
                ->visit(route('admin.channels_lists.index'))
                ->clickLink('Add new')
                ->type('channel_name', $channels_list->channel_name)
                ->type('channel_type', $channels_list->channel_type)
                ->press('Save')
                ->assertRouteIs('admin.channels_lists.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_name']", $channels_list->channel_name)
                ->assertSeeIn("tr:last-child td[field-key='channel_type']", $channels_list->channel_type)
                ->logout();
        });
    }

    public function testEditChannelsList(): void
    {
        $admin = \App\User::find(1);
        $channels_list = factory('App\ChannelsList')->create();
        $channels_list2 = factory('App\ChannelsList')->make();

        $this->browse(function (Browser $browser) use ($admin, $channels_list, $channels_list2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.channels_lists.index'))
                ->click('tr[data-entry-id="'.$channels_list->id.'"] .btn-info')
                ->type('channel_name', $channels_list2->channel_name)
                ->type('channel_type', $channels_list2->channel_type)
                ->press('Update')
                ->assertRouteIs('admin.channels_lists.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_name']", $channels_list2->channel_name)
                ->assertSeeIn("tr:last-child td[field-key='channel_type']", $channels_list2->channel_type)
                ->logout();
        });
    }

    public function testShowChannelsList(): void
    {
        $admin = \App\User::find(1);
        $channels_list = factory('App\ChannelsList')->create();

        $this->browse(function (Browser $browser) use ($admin, $channels_list): void {
            $browser->loginAs($admin)
                ->visit(route('admin.channels_lists.index'))
                ->click('tr[data-entry-id="'.$channels_list->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='channel_name']", $channels_list->channel_name)
                ->assertSeeIn("td[field-key='channel_type']", $channels_list->channel_type)
                ->logout();
        });
    }
}
