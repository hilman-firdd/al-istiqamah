<?php

namespace Firmantr3\Midtrans\Test;

use Firmantr3\Midtrans\Providers\MidtransServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{

    public function setUp(): void
    {
        parent::setUp();

        require_once __DIR__ . '/../vendor/midtrans/midtrans-php/tests/VtTests.php';
        require_once __DIR__ . '/../vendor/midtrans/midtrans-php/tests/utility/VtFixture.php';
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        \Midtrans\VT_Tests::reset();

        parent::tearDown();
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('midtrans.sanitize', 'false');
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            MidtransServiceProvider::class,
        ];
    }
}
