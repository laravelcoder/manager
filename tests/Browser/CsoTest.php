<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CsoTest extends DuskTestCase
{

    public function testCreateCso()
    {
        $admin = \App\User::find(1);
        $cso = factory('App\Cso')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $cso) {
            $browser->loginAs($admin)
                ->visit(route('admin.csos.index'))
                ->clickLink('Add new')
                ->select("channel_server_id", $cso->channel_server_id)
                ->type("ocloud_a", $cso->ocloud_a)
                ->type("ocp_a", $cso->ocp_a)
                ->type("ocloud_b", $cso->ocloud_b)
                ->type("ocp_b", $cso->ocp_b)
                ->select("channel_id", $cso->channel_id)
                ->press('Save')
                ->assertRouteIs('admin.csos.index')
                ->assertSeeIn("tr:last-child td[field-key='ocloud_a']", $cso->ocloud_a)
                ->assertSeeIn("tr:last-child td[field-key='ocp_a']", $cso->ocp_a)
                ->assertSeeIn("tr:last-child td[field-key='ocloud_b']", $cso->ocloud_b)
                ->assertSeeIn("tr:last-child td[field-key='ocp_b']", $cso->ocp_b)
                ->assertSeeIn("tr:last-child td[field-key='channel']", $cso->channel->channel_name)
                ->logout();
        });
    }

    public function testEditCso()
    {
        $admin = \App\User::find(1);
        $cso = factory('App\Cso')->create();
        $cso2 = factory('App\Cso')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $cso, $cso2) {
            $browser->loginAs($admin)
                ->visit(route('admin.csos.index'))
                ->click('tr[data-entry-id="' . $cso->id . '"] .btn-info')
                ->select("channel_server_id", $cso2->channel_server_id)
                ->type("ocloud_a", $cso2->ocloud_a)
                ->type("ocp_a", $cso2->ocp_a)
                ->type("ocloud_b", $cso2->ocloud_b)
                ->type("ocp_b", $cso2->ocp_b)
                ->select("channel_id", $cso2->channel_id)
                ->press('Update')
                ->assertRouteIs('admin.csos.index')
                ->assertSeeIn("tr:last-child td[field-key='ocloud_a']", $cso2->ocloud_a)
                ->assertSeeIn("tr:last-child td[field-key='ocp_a']", $cso2->ocp_a)
                ->assertSeeIn("tr:last-child td[field-key='ocloud_b']", $cso2->ocloud_b)
                ->assertSeeIn("tr:last-child td[field-key='ocp_b']", $cso2->ocp_b)
                ->assertSeeIn("tr:last-child td[field-key='channel']", $cso2->channel->channel_name)
                ->logout();
        });
    }

    public function testShowCso()
    {
        $admin = \App\User::find(1);
        $cso = factory('App\Cso')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $cso) {
            $browser->loginAs($admin)
                ->visit(route('admin.csos.index'))
                ->click('tr[data-entry-id="' . $cso->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='ocloud_a']", $cso->ocloud_a)
                ->assertSeeIn("td[field-key='ocp_a']", $cso->ocp_a)
                ->assertSeeIn("td[field-key='ocloud_b']", $cso->ocloud_b)
                ->assertSeeIn("td[field-key='ocp_b']", $cso->ocp_b)
                ->assertSeeIn("td[field-key='channel']", $cso->channel->channel_name)
                ->logout();
        });
    }

}
