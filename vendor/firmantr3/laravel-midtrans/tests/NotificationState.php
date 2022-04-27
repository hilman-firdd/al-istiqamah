<?php

namespace Firmantr3\Midtrans\Test;

class NotificationState {

    public static $transactionStatusCaptureCallbackDone = false;
    public static $transactionStatusSuccessCallbackDone = false;
    public static $transactionStatusExpireCallbackDone = false;
    public static $transactionStatusCancelCallbackDone = false;
    
    public static $fraudStatusAcceptCallbackDone = false;

}
