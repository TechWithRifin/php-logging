--Pengenalan Logging

1. didalam logging itu ada istilahnya log file. Log file adalah file yang berisikan informasi kejadian dari sebuah sistem dan umumnya informasi log / kejadian ini disimpan dalam bentuk file / berkas
2. biasanya didalam log file, itu terdapat informasi waktu kejadian (kapan suatu log dibuat) dan juga pesan kejadiannya (isi pesannya apa). Jadi isi pesan dan waktu kejadiannya itu mengikuti dari aplikasi (isi pesannya bisa kita buat sendiri akan tetapi untuk waktu kejadiannya itu mengikuti waktu ketika log itu dibuat)
3. Logging adalah suatu aksi menambahkan informasi log ke dalam suatu log file. Jadi mudah nya log itu informasi kejadiannya dan log file itu tempat untuk menyimpan data lognya
4. logging itu sudah menjadi standart industri untuk saat ini yang berfungsi untuk menampilkan informasi yang terjadi di aplikasi yang sedang kita buat.
5. Logging bukan hanya untuk menampilkan informasi saja, Kadang-kadang logging juga digunakan untuk proses debugging ketika terjadi masalah di dalam aplikasi kita. jadi jika suatu saat aplikasi kita tiba-tiba mengalami masalah, kita bisa lihat informasinya didalam logging ini. Karena tanpa adanya logging kita akan sangat kesulitan jika dimasa depan aplikasi yang sudah kita buat tiba-tiba mengalami error.

--Ekosistem logging

1. aplikasi mengirim log event ke dalam log file
2. lalu data log yang ada di dalam log file itu akan ditarik oleh aplikasi log agregator
3. kemudian biasanya data log yang sudah ditarik tersebut akan disimpan kedalam database yang khusus untuk log misalnya elasticsearch atau splank
4. lalu dari log database kita bisa melakukan proses pencarian,
5. pencariannya biasanya ada yang namanya log management. gampangnya log management ini adalah ui managementnya supaya proses pencarian data lognya supaya lebih mudah misalnya ada di splank atau juga kibana

--PHP Logging (tidak disarankan)

1. php sendiri sebenarnya memiliki function yang dikhususkan untuk logging
2. namun saat ini, kebanyakan programmer tidak menggunakannya
3. hal ini dikarenakan penggunaanya yang kurang flexible dan juga fiturnya sangat sederhana
4. https://www.php.net/manual/en/function.error-log.php

--Logging Library

1. Diluar PHP Logging, banyak sekali library yang dapat digunakan untuk logging seperti :
2. Monolog : https://github.com/Seldaek/monolog
3. Analog : https://github.com/jbroadway/analog
4. Log4PHP : https://logging.apache.org/log4php/
5. KLogger : https://github.com/katzgrau/KLogger
6. dan lain-lain

--Monolog

1. kali ini kita akan menggunakan library monolog
2. karena monolog merupakan library logging untuk php yang paling populer saat ini
3. Bahkan framework laravel pun menggunakannya
4. packages untuk monolog bisa dilihat pada link
5. https://packagist.org/packages/monolog/monolog

--install monolog

1. install library monolog versi 2.3.5 dengan menjalankan command
2. composer require monolog/monolog 2.3.5
