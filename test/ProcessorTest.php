<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;

class ProcessorTest extends TestCase
{
    public function testProcessorRecord()
    {
        $logger = new Logger(ProcessorTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr")); //mengirim data log ke console

        // menambahkan informasi tambahan secara global ke semua data log yang ada di logger ini
        $logger->pushProcessor(function ($record) {

            // var_dump($record); // melihat isi dari parameter $record

            // data array extra dibawah ini akan ditambahkan ke semua data log yang ada didalam logger
            $record["extra"]["twr"] = [
                "app" => "belajar PHP Logging",
                "author" => "Tech With Rifin"
            ];
            return $record; //harus mengembalikan data dari variable $record
        });
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());

        // membuat data log
        $logger->info("Hello world", ["username" => "mark"]);
        $logger->info("hello guys");
        $logger->info("hello cuy");
        $this->assertNotNull($logger);
    }
}


/**
 * * Processor *
 * Processor itu merupakan cara lain kalau kita ingin menambahkan informasi ke log event
 * kalau informasi context itu kita harus kirimkan setiap kali kita melakukan proses logging. Sedangkan pada processor, kita bisa buat class Processor yang akan dieksekusi nanti secara otomatis oleh si logger ketika log event dikirim
 * Dengan menggunakan processor,kita bisa menambahkan informasi tambahan secara global ke semua log event yang dikirim (Ini akan sangat berguna ketika kita ingin menambahkan informasi yang sama ke semua log event yang ada di dalam sebuah logger)
 * Untuk membuat processor, kita bisa langsung menggunakan callable (callback function) atau kalau mau lebih rapi, kita bisa membuat class turunan dari ProcessorInterface
 * Kita dapat menambahkan processor ke dalam logger menggunakan method pushProcessor(Processornya);
 * ?Note : processornya bisa berupa callback function ataupun sebuah class yang mengimplementasikan ProcessorInterface
 * Kita bisa menambahkan lebih dari satu processor ke dalam sebuah logger
 */

/**
 * * Monolog Processor *
 * sama seperti Handler, Monolog juga sudah menyediakan banyak sekali class implementasi dari ProcessorInterface dan class implementasi tersebut bisa kita gunakan sesuai kebutuhan yang kita mau
 * ini sangat berguna ketika kita memang ingin menambahkan informasi secara umum ke semua log event yang kita buat
 * jadi kalau context itu untuk informasi yang bersifat dinamis sedangkan kalau processor itu digunakan untuk informasi yang bersifat statis atau fixed
 */

/**
 * * daftar monolog processor
 * GitProcessor => menambahkan informasi yang berhubungan dengan git
 * HostnameProcessor => menambahkan informasi nama host atau server
 * IntrospectionProcessor
 * MemoryPeakUsageProcessor
 * MemoryProcessor
 * MemoryUsageProcessor => menambahkan informasi banyaknya penggunaan memory
 * MercurialProcessor
 * ProcessIdProcessor
 * PsrLogMessageProcessor
 * TagProcessor 
 * UidProcessor
 * WebProcessor => menambahkan informasi mengenai detail tentang webnya
 * 
 */