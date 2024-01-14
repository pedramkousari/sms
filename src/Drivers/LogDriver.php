<?php

namespace Pedramkousari\Sms\Drivers;

use Pedramkousari\Sms\SmsDriverResponse;
use Pedramkousari\Sms\Contracts\DriverMultipleContactsInterface;
use Psr\Log\LoggerInterface;

class LogDriver extends Driver implements DriverMultipleContactsInterface
{
    /**
     * The Logger instance.
     *
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Create a new log driver instance.
     *
     * @param LoggerInterface $logger
     * @return void
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Get the logger for the LogDriver instance.
     *
     * @return LoggerInterface
     */
    public function logger()
    {
        return $this->logger;
    }

    public function send(): SmsDriverResponse
    {
        $to = $this->getTo();

        $request = [
            "type" => $this->getType(),
            "from" => $this->getFrom(),
            "to" => is_array($to) ? implode(",", $to) : $to,
            "message" => $this->getMessage(),
        ];

        $response = $this->logger->debug($this->getEntityString($request));
        return new SmsDriverResponse($request, $response, true);
    }

    /**
     * Get a loggable string
     * @return string
     */
    protected function getEntityString(array $request)
    {
        return (string)__CLASS__
            . PHP_EOL
            . "[Type]: {$request['type']}"
            . PHP_EOL
            . "[From]: {$request['from']}"
            . PHP_EOL
            . "[To]: {$request['to']}"
            . PHP_EOL
            . "[Message]: {$request['message']}";
    }
}