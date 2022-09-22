<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LevelTest extends TestCase
{
    public function testLevel()
    {
        $logger = new Logger(LevelTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr")); //kirim semua data log ke console dari debug sampai emergency
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log", Logger::WARNING)); //kirim data log ke log file aplication.log yang di mulai dari log warning ke atas (log yang akan dikirim yaitu warning, error, critical, alert, emergency)
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../error.log", Logger::ERROR)); //kirim data log ke log file aplication.log yang di mulai dari log error ke atas (log yang akan dikirim yaitu error, critical, alert, emergency)

        // membuat data log
        $logger->debug("this is log with level debug");
        $logger->info("this is log with level info");
        $logger->notice("this is log with level notice");
        $logger->warning("this is log with level warning");
        $logger->error("this is log with level error");
        $logger->critical("this is log with level critical");
        $logger->alert("this is log with level alert");
        $logger->emergency("this is log with level emergency");

        $this->assertNotNull($logger);
    }
}

/**
 * * Level Log *
 * Saat kita mengirim log event, kita bisa menentukan level dari log event tersebut
 * Monolog mendukung banyak sekali level, dimana cara kerja dari level itu bertingkat, dari yang paling rendah (debug) ke paling tinggi (emergency)
 * biasanya level digunakan untuk menentukan jenis log event, misalnya log event yang berupa informasi, kita akan menggunakan level info, jika berupa masalah, kita akan menggunakan level error, jika berupa informasi untuk proses debugging, kita akan menggunakan level debug dan lain sebagainya
 */

/**
 * *Daftar urutan Level dari Log dari yang terendah ke yang tertinggi adalah sebagai berikut (level => logger method => value) : 
 * DEBUG => debug() => 100
 * INFO => info() => 200
 * NOTICE => notice() => 250
 * WARNING => warning() => 300
 * ERROR => error() => 400
 * CRITICAL => critical() => 500
 * ALERT => alert() => 550
 * EMERGENCY => emergency() => 600 
 */

//!note: semakin tinggi level log nya semakin penting informasinya

//didalam leveling kita juga dapat menentukan mulai dari level mana data log yang kita buat itu ditampilkan (misal kita hanya ingin menampilkan data log itu mulai dari warning ke atas, maka level warning, error, critical, alert dan emergency itu akan ditampilkan kemudian info,debug dan notice tidak akan ditampilkan). Secara default semua log akan ditampilkan jika kita tidak mengatur pembatas levelnya terlebih dahulu

/**
 * * StreamHandler Level
 * salah satu kelebihan dari StreamHandler adalah dia bisa menentukan mulai dari level mana log event itu harus dikirim
 * defaultnya, streamHandler akan mengirim mulai dari level DEBUG
 * jika kita ingin mengubahnya, kita bisa mengaturnya ketika membuat object Streamhandler pada parameter kedua
 */