<?php

namespace Firmantr3\Midtrans\Test;

use Midtrans\VT_Tests;
use Firmantr3\Midtrans\Notification;
use Firmantr3\Midtrans\Facade\Midtrans;

class NotificationTest extends TestCase
{
    const TEST_CAPTURE_JSON = '{
        "status_code" : "200",
        "status_message" : "Midtrans payment notification",
        "transaction_id" : "826acc53-14e0-4ae7-95e2-845bf0311579",
        "order_id" : "2014040745",
        "payment_type" : "credit_card",
        "transaction_time" : "2014-04-07 16:22:36",
        "transaction_status" : "capture",
        "fraud_status" : "accept",
        "masked_card" : "411111-1111",
        "gross_amount" : "2700"
    }';

    public function testCanWorkWithJSON()
    {
        $tmpfname = tempnam(sys_get_temp_dir(), "midtrans_test");
        file_put_contents($tmpfname, self::TEST_CAPTURE_JSON);

        VT_Tests::$stubHttp = true;
        VT_Tests::$stubHttpResponse = self::TEST_CAPTURE_JSON;

        $notif = Midtrans::notification($tmpfname);

        $this->assertTrue($notif instanceof Notification);

        $this->assertEquals($notif->transaction_status, "capture");
        $this->assertEquals($notif->payment_type, "credit_card");
        $this->assertEquals($notif->order_id, "2014040745");
        $this->assertEquals($notif->gross_amount, "2700");

        unlink($tmpfname);
    }

    public function testCanWorkWithMockedJSON()
    {
        // mock input source
        Midtrans::shouldReceive('input')
            ->with('php://input')
            ->andReturn('{
                "status_code" : "200",
                "status_message" : "Midtrans payment notification",
                "transaction_id" : "My Transaction Id",
                "order_id" : "My Order Id",
                "payment_type" : "credit_card",
                "transaction_time" : "2014-04-07 16:22:36",
                "transaction_status" : "capture",
                "fraud_status" : "accept",
                "masked_card" : "411111-1111",
                "gross_amount" : "9999"
            }');

        // mock midtrans transaction status
        Midtrans::shouldReceive('status')
            ->once()
            ->with('My Transaction Id')
            ->andReturn((object) [
                "status_code" => "200",
                "status_message" => "Midtrans payment notification",
                "transaction_id" => "My Transaction Id",
                "order_id" => "My Order Id",
                "payment_type" => "credit_card",
                "transaction_time" => "2014-04-07 16:22:36",
                "transaction_status" => "capture",
                "fraud_status" => "accept",
                "masked_card" => "411111-1111",
                "gross_amount" => "9999",
            ]);
        
        // make mock partial so unmocked methods can still be accessed
        Midtrans::makePartial();

        $notif = Midtrans::notification();

        $this->assertTrue($notif instanceof Notification);

        $this->assertEquals($notif->transaction_status, "capture");
        $this->assertEquals($notif->payment_type, "credit_card");
        $this->assertEquals($notif->order_id, "My Order Id");
        $this->assertEquals($notif->gross_amount, "9999");

        $this->assertIsArray($notif->all());
        $this->assertIsArray($notif->toArray());
        $this->assertIsObject($notif->getResponse());
        $this->assertIsObject($notif->toObject());

        $this->assertEquals($notif->toObject()->transaction_status, "capture");
        $this->assertEquals($notif->toObject()->payment_type, "credit_card");
        $this->assertEquals($notif->toObject()->order_id, "My Order Id");
        $this->assertEquals($notif->toObject()->gross_amount, "9999");

        $this->assertEquals($notif->toArray()['transaction_status'], "capture");
        $this->assertEquals($notif->toArray()['payment_type'], "credit_card");
        $this->assertEquals($notif->toArray()['order_id'], "My Order Id");
        $this->assertEquals($notif->toArray()['gross_amount'], "9999");

        $notif->onCapture(function($notif) {
            NotificationState::$transactionStatusCaptureCallbackDone = true;

            $notif->onFraudStatus('accept', function($notif) {
                NotificationState::$fraudStatusAcceptCallbackDone = true;
            });
        })
        ->onSuccess(function($notif) {
            NotificationState::$transactionStatusSuccessCallbackDone = true;
        });
        $this->assertTrue(NotificationState::$transactionStatusCaptureCallbackDone);
        $this->assertTrue(NotificationState::$fraudStatusAcceptCallbackDone);
        $this->assertFalse(NotificationState::$transactionStatusSuccessCallbackDone);
    }
}
