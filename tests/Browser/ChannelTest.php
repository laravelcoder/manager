<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ChannelTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateChannel(): void
    {
        $admin = \App\User::find(1);
        $channel = factory('App\Channel')->make();

        $this->browse(function (Browser $browser) use ($admin, $channel): void {
            $browser->loginAs($admin)
                ->visit(route('admin.channels.index'))
                ->clickLink('Add new')
                ->type('channelid', $channel->channelid)
                ->select('type', $channel->type)
                ->press('Save')
                ->assertRouteIs('admin.channels.index')
                ->assertSeeIn("tr:last-child td[field-key='channelid']", $channel->channelid)
                ->assertSeeIn("tr:last-child td[field-key='type']", $channel->type);
        });
    }

    public function testEditChannel(): void
    {
        $admin = \App\User::find(1);
        $channel = factory('App\Channel')->create();
        $channel2 = factory('App\Channel')->make();

        $this->browse(function (Browser $browser) use ($admin, $channel, $channel2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.channels.index'))
                ->click('tr[data-entry-id="'.$channel->id.'"] .btn-info')
                ->type('channelid', $channel2->channelid)
                ->select('type', $channel2->type)
                ->press('Update')
                ->assertRouteIs('admin.channels.index')
                ->assertSeeIn("tr:last-child td[field-key='channelid']", $channel2->channelid)
                ->assertSeeIn("tr:last-child td[field-key='type']", $channel2->type);
        });
    }

    public function testShowChannel(): void
    {
        $admin = \App\User::find(1);
        $channel = factory('App\Channel')->create();

        $this->browse(function (Browser $browser) use ($admin, $channel): void {
            $browser->loginAs($admin)
                ->visit(route('admin.channels.index'))
                ->click('tr[data-entry-id="'.$channel->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='channelid']", $channel->channelid)
                ->assertSeeIn("td[field-key='type']", $channel->type);
        });
    }
}
