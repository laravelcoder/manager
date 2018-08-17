<?php

declare(strict_types=1);

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OutputSettingTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateOutputSetting(): void
    {
        $admin = \App\User::find(1);
        $output_setting = factory('App\OutputSetting')->make();

        $this->browse(function (Browser $browser) use ($admin, $output_setting): void {
            $browser->loginAs($admin)
                ->visit(route('admin.output_settings.index'))
                ->clickLink('Add new')
                ->type('report_time', $output_setting->report_time)
                ->select('email_id', $output_setting->email_id)
                ->select('sync_server_id', $output_setting->sync_server_id)
                ->press('Save')
                ->assertRouteIs('admin.output_settings.index')
                ->assertSeeIn("tr:last-child td[field-key='report_time']", $output_setting->report_time)
                ->assertSeeIn("tr:last-child td[field-key='email']", $output_setting->email->email);
        });
    }

    public function testEditOutputSetting(): void
    {
        $admin = \App\User::find(1);
        $output_setting = factory('App\OutputSetting')->create();
        $output_setting2 = factory('App\OutputSetting')->make();

        $this->browse(function (Browser $browser) use ($admin, $output_setting, $output_setting2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.output_settings.index'))
                ->click('tr[data-entry-id="'.$output_setting->id.'"] .btn-info')
                ->type('report_time', $output_setting2->report_time)
                ->select('email_id', $output_setting2->email_id)
                ->select('sync_server_id', $output_setting2->sync_server_id)
                ->press('Update')
                ->assertRouteIs('admin.output_settings.index')
                ->assertSeeIn("tr:last-child td[field-key='report_time']", $output_setting2->report_time)
                ->assertSeeIn("tr:last-child td[field-key='email']", $output_setting2->email->email);
        });
    }

    public function testShowOutputSetting(): void
    {
        $admin = \App\User::find(1);
        $output_setting = factory('App\OutputSetting')->create();

        $this->browse(function (Browser $browser) use ($admin, $output_setting): void {
            $browser->loginAs($admin)
                ->visit(route('admin.output_settings.index'))
                ->click('tr[data-entry-id="'.$output_setting->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='report_time']", $output_setting->report_time)
                ->assertSeeIn("td[field-key='email']", $output_setting->email->email)
                ->assertSeeIn("td[field-key='sync_server']", $output_setting->sync_server->name);
        });
    }
}
