<?php

declare(strict_types=1);

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PermissionTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreatePermission(): void
    {
        $admin = \App\User::find(1);
        $permission = factory('App\Permission')->make();

        $this->browse(function (Browser $browser) use ($admin, $permission): void {
            $browser->loginAs($admin)
                ->visit(route('admin.permissions.index'))
                ->clickLink('Add new')
                ->type('title', $permission->title)
                ->press('Save')
                ->assertRouteIs('admin.permissions.index')
                ->assertSeeIn("tr:last-child td[field-key='title']", $permission->title);
        });
    }

    public function testEditPermission(): void
    {
        $admin = \App\User::find(1);
        $permission = factory('App\Permission')->create();
        $permission2 = factory('App\Permission')->make();

        $this->browse(function (Browser $browser) use ($admin, $permission, $permission2): void {
            $browser->loginAs($admin)
                ->visit(route('admin.permissions.index'))
                ->click('tr[data-entry-id="'.$permission->id.'"] .btn-info')
                ->type('title', $permission2->title)
                ->press('Update')
                ->assertRouteIs('admin.permissions.index')
                ->assertSeeIn("tr:last-child td[field-key='title']", $permission2->title);
        });
    }

    public function testShowPermission(): void
    {
        $admin = \App\User::find(1);
        $permission = factory('App\Permission')->create();

        $this->browse(function (Browser $browser) use ($admin, $permission): void {
            $browser->loginAs($admin)
                ->visit(route('admin.permissions.index'))
                ->click('tr[data-entry-id="'.$permission->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='title']", $permission->title);
        });
    }
}
