<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use PHPUnit\Framework\TestCase;
use Monolog\Logger;

class ContextTest extends TestCase
{
    public function testContext()
    {
        $logger = new Logger(ContextTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr")); //mengirim data log ke console
        // membuat log yang disertai dengan context
        $logger->info("this is log massage", ["username" => "michael"]);
        $logger->info("try login user", ["username" => "mark"]);
        $logger->info("success login user", ["username" => "mark"]);

        $this->assertNotNull($logger);
    }
}


/**
 * * Context *
 * selain mengirimkan informasi log event berupa data string, kita juga bisa menambahkan informasi lainnya berupa data array ketika kita melakukan proses logging
 * Informasi tambahan tersebut dinamakan context. Jadi context itu adalah informasi tambahan yang berupa array
 * context ini sangat bermanfaat kalau memang kita ingin menambahkan informasi yang berhubungan dengan log eventnya. Sehingga kita tidak perlu lagi membuat format pesan secara manual. Cukup kirim data context yang berupa array tersebut pada parameter kedua pada method loggingnya
 */