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

        $relations = [
            factory('App\ChannelsList')->create(), 
            factory('App\ChannelsList')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $channel_server, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.channel_servers.index'))
                ->clickLink('Add new')
                ->type("name", $channel_server->name)
                ->type("cs_host", $channel_server->cs_host)
                ->select('select[name="channel[]"]', $relations[0]->id)
                ->select('select[name="channel[]"]', $relations[1]->id)
                ->press('Save')
                ->assertRouteIs('admin.channel_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $channel_server->name)
                ->assertSeeIn("tr:last-child td[field-key='cs_host']", $channel_server->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='channel'] span:first-child", $relations[0]->channel_name)
                ->assertSeeIn("tr:last-child td[field-key='channel'] span:last-child", $relations[1]->channel_name)
                ->logout();
        });
    }

    public function testEditChannelServer()
    {
        $admin = \App\User::find(1);
        $channel_server = factory('App\ChannelServer')->create();
        $channel_server2 = factory('App\ChannelServer')->make();

        $relations = [
            factory('App\ChannelsList')->create(), 
            factory('App\ChannelsList')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $channel_server, $channel_server2, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.channel_servers.index'))
                ->click('tr[data-entry-id="' . $channel_server->id . '"] .btn-info')
                ->type("name", $channel_server2->name)
                ->type("cs_host", $channel_server2->cs_host)
                ->select('select[name="channel[]"]', $relations[0]->id)
                ->select('select[name="channel[]"]', $relations[1]->id)
                ->press('Update')
                ->assertRouteIs('admin.channel_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $channel_server2->name)
                ->assertSeeIn("tr:last-child td[field-key='cs_host']", $channel_server2->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='channel'] span:first-child", $relations[0]->channel_name)
                ->assertSeeIn("tr:last-child td[field-key='channel'] span:last-child", $relations[1]->channel_name)
                ->logout();
        });
    }

    public function testShowChannelServer()
    {
        $admin = \App\User::find(1);
        $channel_server = factory('App\ChannelServer')->create();

        $relations = [
            factory('App\ChannelsList')->create(), 
            factory('App\ChannelsList')->create(), 
        ];

        $channel_server->channel()->attach([$relations[0]->id, $relations[1]->id]);

        $this->browse(function (Browser $browser) use ($admin, $channel_server, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.channel_servers.index'))
                ->click('tr[data-entry-id="' . $channel_server->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $channel_server->name)
                ->assertSeeIn("td[field-key='cs_host']", $channel_server->cs_host)
                ->assertSeeIn("tr:last-child td[field-key='channel'] span:first-child", $relations[0]->channel_name)
                ->assertSeeIn("tr:last-child td[field-key='channel'] span:last-child", $relations[1]->channel_name)
                ->logout();
        });
    }

}
