<?php

// Memasukkan file class-mahasiswa.php untuk mengakses class Mahasiswa
include '../config/class-mahasiswa.php';
// Membuat objek dari class Mahasiswa
$customer = new Customer();
// Mengambil data mahasiswa dari form input menggunakan metode POST dan menyimpannya dalam array
$dataCustomer = [
    'no' => $_POST['no'],
    'date' => $_POST['date'],
    'nama' => $_POST['nama'],
    'table' => $_POST['table'],
    'menu' => $_POST['menu'],
    'telp' => $_POST['telp'],
    'email' => $_POST['email']
];
// Memanggil method inputMahasiswa untuk memasukkan data mahasiswa dengan parameter array $dataMahasiswa
$input = $customer->inputCustomer($dataCustomer);
// Mengecek apakah proses input berhasil atau tidak - true/false
if($input){
    // Jika berhasil, redirect ke halaman data-list.php dengan status inputsuccess
    header("Location: ../data-list.php?status=inputsuccess");
} else {
    // Jika gagal, redirect ke halaman data-input.php dengan status failed
    header("Location: ../data-input.php?status=failed");
}

?>