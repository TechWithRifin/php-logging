<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use PHPUnit\Framework\TestCase;
use Monolog\Logger;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        $logger = new Logger(LoggingTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr")); //kirim ke data log ke console
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log")); //kirim data log ke log file bernama application.log

        //membuat data log
        $logger->info("Belajar Pemrograman PHP Logging");
        $logger->info("selamat data di tech with rifin");
        $logger->info("isi informasi aplikasi logging");
        // ketika unit test ini dijalankan, maka ketiga data log diatas akan dikirim ke dalam console dan juga ke dalam log file yang bernama application.log
        $this->assertNotNull($logger);
    }
}


/**
 * * Logging *
 * Setelah kita membuat logger dan menambahkan handler ke dalam logger
 * kita bisa melakukan proses logging
 * ada banyak method di logger yang bisa kita gunakan untuk melakukan logging. diantaranya adalah debug,info,warning,error dll
 * format penulisan log level info adalah info("informasi log nya");
 * format hasil log adalah sebagai berikut
 * [informasi waktu log terjadi] namaLogger.levelLog: informasi dari si log nya [context][extra]
 */