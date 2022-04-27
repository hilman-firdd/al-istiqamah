<?php

namespace Firmantr3\Midtrans\Test;

use Midtrans\Snap;
use Midtrans\VT_Tests;

/**
 * Test using official classes, ensure using same laravel config
 */
class MidtransSnapTest extends TestCase
{
    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('midtrans.sanitize', 'false');
        $app['config']->set('midtrans.server_key', 'My Very Secret Key');
    }

    public function testGetToken()
    {
        VT_Tests::$stubHttp = true;
        VT_Tests::$stubHttpResponse = '{ "token": "abcdefghijklmnopqrstuvwxyz" }';
        VT_Tests::$stubHttpStatus = array('http_code' => 201);

        $params = array(
            'transaction_details' => array(
            'order_id' => "Order-111",
            'gross_amount' => 10000,
            )
        );

        $tokenId = Snap::getSnapToken($params);

        $this->assertEquals($tokenId, "abcdefghijklmnopqrstuvwxyz");

        $this->assertEquals(
            VT_Tests::$lastHttpRequest["url"],
            "https://app.sandbox.midtrans.com/snap/v1/transactions"
        );

        $this->assertEquals(
            VT_Tests::$lastHttpRequest["server_key"],
            'My Very Secret Key'
        );

        $fields = VT_Tests::lastReqOptions();

        $this->assertEquals($fields["POST"], 1);
        $this->assertEquals(
            $fields["POSTFIELDS"],
            '{"credit_card":{"secure":false},' .
            '"transaction_details":{"order_id":"Order-111","gross_amount":10000}}'
        );
    }

    public function testGrossAmount()
    {
        $params = array(
            'transaction_details' => array(
                'order_id' => rand()
            ),
            'item_details' => array(
                array(
                    'price' => 10000,
                    'quantity' => 5
                )
            )
        );

        VT_Tests::$stubHttp = true;
        VT_Tests::$stubHttpResponse = '{ "token": "abcdefghijklmnopqrstuvwxyz" }';
        VT_Tests::$stubHttpStatus = array('http_code' => 201);

        $tokenId = Snap::getSnapToken($params);

        $this->assertEquals(
            VT_Tests::$lastHttpRequest['data_hash']['transaction_details']['gross_amount'],
            50000
        );
    }

    public function testOverrideParams()
    {
        $params = array(
            'echannel' => array(
            'bill_info1' => 'bill_value1'
            )
        );

        VT_Tests::$stubHttp = true;
        VT_Tests::$stubHttpResponse = '{ "token": "abcdefghijklmnopqrstuvwxyz" }';
        VT_Tests::$stubHttpStatus = array('http_code' => 201);

        $tokenId = Snap::getSnapToken($params);

        $this->assertEquals(
            VT_Tests::$lastHttpRequest['data_hash']['echannel'],
            array('bill_info1' => 'bill_value1')
        );
    }

    public function testRealConnect()
    {
        $params = array(
            'transaction_details' => array(
            'order_id' => rand(),
            'gross_amount' => 10000,
            )
        );

        try {
            $tokenId = Snap::getSnapToken($params);
        } catch (\Exception $error) {
            $errorHappen = true;
            $this->assertStringContainsString(
                "authorized",
                $error->getMessage()
            );
        }

        $this->assertTrue($errorHappen);
    }
}
