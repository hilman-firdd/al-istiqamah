<?php 

namespace Firmantr3\Midtrans\Test;

use Firmantr3\Midtrans\Providers\MidtransServiceProvider;

class ServiceProviderTest extends TestCase {

    /** @var MidtransServiceProvider */
    protected $serviceProvider;

    /**
     * This method is called before each test.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->serviceProvider = new MidtransServiceProvider($this->app);
    }

    /** @test */
    public function table_config_path_is_exist() {
        $this->assertTrue(file_exists($this->serviceProvider->getConfigPath()));
    }

}
