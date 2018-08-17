<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ChannelServerTest extends DuskTestCase
{

    public function testCreateChannelServer()
    {
        $admin = \App\User::find(1);
        $channel_server = factory('App\ChannelServer')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $channel_server) {
            $browser->loginAs($admin)
                ->visit(route('admin.channel_servers.index'))
                ->clickLink('Add new')
                ->type("name", $channel_server->name)
                ->type("cs_host", $channel_server->cs_host)
                ->press('Save')
                ->assertRouteIs('admin.channel_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $channel_server->name)
                ->assertSeeIn("tr:last-child td[field-key='cs_host']", $channel_server->cs_host)
                ->logout();
        });
    }

    public function testEditChannelServer()
    {
        $admin = \App\User::find(1);
        $channel_server = factory('App\ChannelServer')->create();
        $channel_server2 = factory('App\ChannelServer')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $channel_server, $channel_server2) {
            $browser->loginAs($admin)
                ->visit(route('admin.channel_servers.index'))
                ->click('tr[data-entry-id="' . $channel_server->id . '"] .btn-info')
                ->type("name", $channel_server2->name)
                ->type("cs_host", $channel_server2->cs_host)
                ->press('Update')
                ->assertRouteIs('admin.channel_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $channel_server2->name)
                ->assertSeeIn("tr:last-child td[field-key='cs_host']", $channel_server2->cs_host)
                ->logout();
        });
    }

    public function testShowChannelServer()
    {
        $admin = \App\User::find(1);
        $channel_server = factory('App\ChannelServer')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $channel_server) {
            $browser->loginAs($admin)
                ->visit(route('admin.channel_servers.index'))
                ->click('tr[data-entry-id="' . $channel_server->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $channel_server->name)
                ->assertSeeIn("td[field-key='cs_host']", $channel_server->cs_host)
                ->logout();
        });
    }

}