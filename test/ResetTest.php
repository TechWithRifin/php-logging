<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;

class ResetTest extends TestCase
{
    public function testReset()
    {
        $logger = new Logger(ResetTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new HostnameProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());

        for ($i = 0; $i < 10000; $i++) {
            $logger->info("Loop-$i");
            if ($i % 100 == 0) {
                $logger->reset();
            }
        }
        $this->assertNotNull($logger);
    }
}