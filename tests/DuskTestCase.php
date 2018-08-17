<?php

declare(strict_types=1);

namespace Tests;

use App\Permission;
use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication, InteractsWithSession;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare(): void
    {
        static::startChromeDriver();
    }

    protected function setUpTraits()
    {
        $this->createDatabaseAndSeedsIfNeeded();

        return parent::setUpTraits();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()
        );
    }

    /**
     * Creates an empty database for testing, but backups the current dev one first.
     */
    public function createDatabaseAndSeedsIfNeeded(): void
    {
        if (! $this->app) {
            $this->refreshApplication();
        }

        $this->artisan('migrate:fresh');

        if (Permission::all()->count() === 0) {
            $this->artisan('db:seed');
        }
    }
}
