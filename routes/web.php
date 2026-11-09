<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rute mengembalikan string teks langsung
Route::get('/halo', function () {
return 'Selamat datang di Praktikum Teknologi Web - Framework Laravel!';
});
// Rute mengembalikan data array dalam format JSON otomatis
Route::get('/info-kampus', function () {
return [
'universitas' => 'Universitas Jenderal Achmad Yani',
'fakultas' => 'Fakultas Sains dan Informatika',
'jurusan' => 'Informatika',
'tahun' => 2024
];
});

// Parameter Wajib
Route::get('/mahasiswa/{nim}', function ($nim) {
return "Profil Mahasiswa dengan NIM: " . htmlspecialchars($nim);
})->whereNumber('nim'); // Constraint agar hanya menerima angka
// Parameter Opsional dengan nilai default
Route::get('/salam/{nama?}', function ($nama = 'Mahasiswa') {
return "Halo, Selamat Belajar " . htmlspecialchars($nama) . "!";
});

Route::get('/tentang-laboratorium-web', function () {
return 'Halaman Resmi Laboratorium Komputer dan Teknologi Web.';
})->name('lab.about');
// Uji pemanggilan named route menggunakan helper route()
Route::get('/uji-redirect', function () {
return redirect()->route('lab.about');
});

Route::prefix('akademik')->name('akademik.')->group(function () {
Route::get('/jadwal', function () {
return "Jadwal Perkuliahan Semester Berjalan";
})->name('jadwal');

Route::get('/krs', function () {
return "Halaman Pengisian Kartu Rencana Studi (KRS)";
})->name('krs');

Route::get('/nilai', function () {
return "Kartu Hasil Studi (KHS) dan Transkrip Nilai";
})->name('nilai');
});