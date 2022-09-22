<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use Monolog\Handler\ElasticsearchHandler;
use PHPUnit\Framework\TestCase;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SlackHandler;

class HandlerTest extends TestCase
{
    public function testHandler()
    {
        $logger = new Logger(HandlerTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr")); //mengirim data log ke console
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log")); //mengirim data log ke file yang bernama aplication.log
        // $logger->pushHandler(new SlackHandler());//mengirim data log ke aplikasi slack
        // $logger->pushHandler(new ElasticsearchHandler()); //mengirim data log ke aplikasi elasticsearch

        $this->assertNotNull($logger);
        $this->assertEquals(2, sizeof($logger->getHandlers())); // disini phpunit  mengecek jika jumlah handler yang ada didalam logger tidak sama dengan 2 maka unit test ini akan gagal (method sizeof($logger->getHandlers()) ini berfungsi untuk menghitung jumlah handler yang ditambahkan ke dalam logger yang sudah kita buat)
    }
}

/**
 * * Handler *
 * didalam monolog itu ada sebuah fitur yang namanya Handler
 * Handler merupakan object yang bertugas mengirim aktivitas log event yang kita kirim pada logger ke target yang dituju. Jadi saat kita mengirimkan log, kita ingin simpan log itu dimana? apakah di console, file, ataukah ke email misalnya (gampangnya handler ini adalah fitur untuk mengatur dimana kita akan menyimpan data log kita)
 * secara default, tidak ada  handler sama sekali didalam logger, artinya kita perlu menambahkan handler ke dalam logger secara manual. Karena kalau tidak ada handler, maka semua aktivitas logging yang kita kirimkan kedalam logger itu akan hilang / tidak akan dikirim kemana-mana
 * handler didalam monolog itu direpresentasikan ke dalam interface yang namanya handlerInterface
 * https://github.com/Seldaek/monolog/blob/main/src/Monolog/Handler/HandlerInterface.php
 */

/**
 * * Implementasi Handler *
 * karena HandlerInterface adalah sebuah interface, maka untuk menambahkan handler, kita perlu membuat implementasi class dari handlerInterface
 * Akan tetapi, sebenarnya didalam Monolog itu sudah menyediakan banyak sekali handler yang kita butuhkan. Jadi kita tidak perlu lagi membuat implementasi class dari handlerInterface secara manual
 */

/**
 * * Stream Handler *
 * salah satu handler yang sering kali digunakan adalah streamHandler
 * StreamHandler merupakan handler yang bisa kita gunakan untuk mengirim log event ke dalam file atau console
 * https://github.com/Seldaek/monolog/blob/main/src/Monolog/Handler/StreamHandler.php
 */

/**
 * * Cara Menggunakan Handler *
 * kita dapat menggunakan handler dengan menambahkan method pushHandler(new NamaHandlernya());
 * method pushHandler digunakan untuk menambahkan handler
 * Disaat kita membuat logger, kita bisa menambahkan lebih dari satu handler
 * Misalnya kita mau mengirim data lognya ke file, console dan log secara bersamaan itu bisa dilakukan (kita bisa langsung menambahkan 3 handler)
 */