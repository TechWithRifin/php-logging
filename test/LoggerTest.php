<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
    public function testLogger()
    {
        $logger = new Logger("phpLogger"); //logger ini bernama phpLogger

        $this->assertNotNull($logger);
    }

    public function testLoggerWithName()
    {
        $logger = new Logger(LoggerTest::class); //dengan ini kita bisa tahu bahwa object logger ini berasal dari class LoggerTest saat melakukan proses logging
        $this->assertNotNull($logger);
    }
}

/**
 * * Logger * 
 * logger merupakan class yang digunakan untuk melakukan logging. Jadi inti dari monolog ini adalah class yang bernama logger (kita harus membuat object logger sebelum melakukan proses logging)
 * untuk membuat object logger sangatlah mudah, kita cukup gunakan nama logger yang kita inginkan di parameter construcktornya
 * format pembuatan object logger ialah new Logger("nama loggernya") <- nama loggernya berupa string bebas
 */

/**
 * * Nama Logger dengan Nama Class
 * salah satu cara yang paling baik untuk membuat object logger adalah membuat nama logger menggunakan nama class lokasi logger itu dibuat.
 * Misalnya jika kita membuat object logger di dalam class ProductController, maka kita sebaiknya menggunakan nama loggernya  adalah ProductController:class
 * Hal ini dilakukan supaya pada saat kita melakukan proses logging kita bisa tahu lokasi asal suatu log dibuat berdasarkan nama loggernya 
 * misal log a itu berasal dari productcontroller
 * 
 */