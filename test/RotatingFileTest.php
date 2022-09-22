<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;

class RotatingFileTest extends TestCase
{
    public function testRotating()
    {
        $logger = new Logger(RotatingFileTest::class);
        $logger->pushHandler(new RotatingFileHandler(__DIR__ . "/../app.log", 10, Logger::INFO)); //secara otomatis membuat file baru dengan nama app-Y-m-d.log ketika ganti hari

        // membuat data log / melakukan logging
        $logger->info("Belajar PHP Datar");
        $logger->info("Belajar PHP OOP");
        $logger->info("Belajar PHP Web");
        $logger->info("Belajar PHP Logging");

        $this->assertNotNull($logger);
    }
}

/**
 * * Rotating File Handler *
 * Saat menggunakan file sebagai media penyimpanan data log, kadang semakin lama, ukuran filenya akan semakin membesar. Apalagi misalnya filenya cuma satu.
 * secara default StreamHandler akan selalu mengirim log eventnya ke dalam file yang sama secara terus menerus. Jadi pada saat dirunning sekarang, besok dan seterusnya, streamhandler akan mengirim log eventnya ke dalam file yang sama sesuai yang sudah kita atur pada method pushHandler.
 * Hal tersebut akan menjadi mesalah karena kalau kita menyimpan semua log didalam satu file, maka ukuran file tersebut semakin lama akan semakin besar kemudian data log akan susah untuk dibaca dan juga susah untuk mencari sesuatu di dalam data log tersebut
 * Untungnya ada  class turunan dari streamhandler, namanya adalah RotatingFileHandler
 * Class ini dikhususkan untuk mengirim log eventnya ke file, namun handler ini dapat secara otomatis membuat file baru pada saat ganti hari sehingga semua log eventnya tidak akan disimpan didalam satu file saja. Jadi setiap file cuma berisi log selama satu hari saja
 * ini bagus untuk memastikan ukuran log filenya tidak terlalu besar karena filenya hanya berisi log selama sehari saja, dan  nanti mudah kalau kita misalnya ingin menghapus log lama yang sudah tidak kita gunakan lagi. Contohnya kita ingin menghapus log sebulan yang lalu itu mudah kita tinggal menghapus file-file log sebulan yang lalu saja 
 * format penulisan handlerya adalah 
 * ?pushHandler(new RotatingFileHandler(namaFilenya, jumlahFileYangInginDisimpan, MulaidariLevelBerapaKitaInginMengirimLognya));
 * pada parameter jumlahFileYangInginDisimpan misalnya kita mengisi nilai 10 maka file log yang akan disimpan hanya file log 10 hari terakhir dan jika ada file log hari ke 11 maka file log hari kesebelas itu secara otomatis akan dihapus.
 */

//  ?Note: RotatingFileHandler hanya bisa mengirim log event ke dalam file saja