<?php

// Memasukkan file class-mahasiswa.php untuk mengakses class Mahasiswa
include_once '../config/class-mahasiswa.php';
// Membuat objek dari class Mahasiswa
$customer = new Customer();
// Mengambil data mahasiswa dari form edit menggunakan metode POST dan menyimpannya dalam array
$dataCustomer = [
    'id' => $_POST['id'],
    'no' => $_POST['no'],
    'date' => $_POST['date'],
    'nama' => $_POST['nama'],
    'table' => $_POST['table'],
    'menu' => $_POST['menu'],
    'telp' => $_POST['telp'],
    'email' => $_POST['email']
];
// Memanggil method editMahasiswa untuk mengupdate data mahasiswa dengan parameter array $dataMahasiswa
$edit = $customer->editCustomer($dataCustomer);
// Mengecek apakah proses edit berhasil atau tidak - true/false
if($edit){
    // Jika berhasil, redirect ke halaman data-list.php dengan status editsuccess
    header("Location: ../data-list.php?status=editsuccess");
} else {
    // Jika gagal, redirect ke halaman data-edit.php dengan status failed dan membawa id mahasiswa
    header("Location: ../data-edit.php?id=".$dataCustomer['id']."&status=failed");
}

?>