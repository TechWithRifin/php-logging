<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use Monolog\Formatter\JsonFormatter;
use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;

class FormatterTest extends TestCase
{
    public function testFormatter()
    {
        $logger = new Logger(FormatterTest::class);

        $handler = new StreamHandler(__DIR__ . "/../sample-log.json");
        $handler->setFormatter(new JsonFormatter()); //mengatur formatter dari handler StreamHandler menjadi jsonformatter
        $logger->pushHandler($handler); //menambahkan handler ke dalam logger
        // menambahkan beberapa processor ke dalam logger
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());

        // menambahkan data log / melakukan logging
        $logger->info("belajar php logging", ["username" => "carl"]);
        $logger->info("belajar php logging lagi", ["username" => "mark"]);
        // data log diatas akan ditampilkan dalam bentuk json

        $this->assertNotNull($logger);
    }
}


/**
 * * Formatter *
 * saat suatu handler mengirim log event ke tujuannya (misalnya ke file atau console). Maka handler tersebut akan melakukan proses format log event terlebih dahulu sebelum log event itu dikirim ke tujuannya
 * Setiap handler biasanya memiliki default formatter. Contohnya jika menggunakan Streamhandler, default formatternya menggunakan class yang namanya LineFormatter
 * Jika kita ingin membuat formatter sendiri, kita bisa membuat class turunan dari FormatterInterface
 */

/**
 * * Monolog Formatter *
 * Monolog sendiri sudah menyediakan banyak formatter diantaranya adalah : 
 * ChromePHPFormatter
 * ElasticaFormatter
 * ElasticSearchFormatter
 * FlowDockFormatter
 * FluentdFormatter
 * GelfMessageFormatter
 * HtmlFormatter
 * JsonFormatter
 * LineFormatter
 * LogglyFormatter
 * LogmaticFormatter
 * LogslashFormatter
 * MongoDBFormatter
 * NormalizerFormatter
 * ScalarFormatter
 * WildfireFormatter
 */

// ?Note : dengan banyaknya formatter yang sudah disediakan, kita tidak perlu capek-capek membuat formatternya secara manual
// !Penting : kita hanya boleh menambahkan 1 formatter untuk 1 handler (formatter default dari handler akan ditimpa dengan formatter yang baru)