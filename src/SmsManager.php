<?php

namespace Pedramkousari\Sms;
use Pedramkousari\Sms\Drivers\LogDriver;
use Psr\Log\LoggerInterface;

class SmsManager extends \Illuminate\Support\Manager
{
    public function createLogDriver()
    {
        $logger = $this->app->make(LoggerInterface::class);
        return new LogDriver($logger);
    }
    
    public function getDefaultDriver()
    {
        if (is_null($this->app['config']['sms.default'])) {
            return 'log';
        }

        return $this->app['config']['sms.default'];
    }
}