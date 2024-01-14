<?php

namespace Pedramkousari\Sms\Drivers;

use Pedramkousari\Sms\Contracts\DriverMultipleContactsInterface;
use Pedramkousari\Sms\SmsDriverResponse;

class MciDriver extends Driver implements DriverMultipleContactsInterface
{

    public function send(): SmsDriverResponse
    {
        dd("MCI Send SMS");
    }
}