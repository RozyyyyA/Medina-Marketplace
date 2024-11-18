<?php

/*
 *---------------------------------------------------------------
 * CHECK PHP VERSION
 *---------------------------------------------------------------
 */

$minPhpVersion = '8.1'; // Versi PHP minimum
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
        $minPhpVersion,
        PHP_VERSION
    );

    // Mengembalikan kode status 503 jika versi PHP tidak memenuhi syarat
    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo $message;

    exit(1);
}

/*
 *---------------------------------------------------------------
 * SET THE CURRENT DIRECTORY
 *---------------------------------------------------------------
 */

// Path ke front controller (file ini)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Memastikan direktori saat ini menunjuk ke direktori front controller
if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 */

// MUAT FILE KONFIGURASI PATH KITA
require FCPATH . '../app/Config/Paths.php'; // Ubah sesuai dengan struktur folder Anda
$paths = new Config\Paths();

// MUAT FILE BOOTSTRAP FRAMEWORK
require $paths->systemDirectory . '/Boot.php';

// Jalankan aplikasi dan exit
exit(CodeIgniter\Boot::bootWeb($paths));
