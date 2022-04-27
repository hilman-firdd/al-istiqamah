<?php 

namespace Firmantr3\Midtrans\Test;

use Firmantr3\Midtrans\Facade\Midtrans;
use Midtrans\Config;

class ClientTest extends TestCase {

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('midtrans.client_key', 'My Client Key');
    }

    public function testClientKeyConfig() {
        $this->assertEquals('My Client Key', Midtrans::clientKey());
        $this->assertEquals('My Client Key', Config::$clientKey);
    }

}
