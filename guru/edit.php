<?php

include '../lib/library.php';

$id_guru = @$_GET['id_guru'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_guru        = @$_POST['id_guru'];
    $email          = @$_POST['email'];
    $nama           = @$_POST['nama'];
    $tempat_lahir   = @$_POST['tempat_lahir'];
    $tanggal_lahir  = @$_POST['tanggal_lahir'];
    $jenis_kelamin  = @$_POST['jenis_kelamin'];
    $agama          = @$_POST['agama'];
    $no_telepon     = @$_POST['no_telepon'];
    $id_provinsi    = '-';
    $id_kabupaten   = '-';
    $id_kecamatan   = '-';
    $id_kelurahan   = '-';
    $alamat         = @$_POST['alamat'];


    // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
    $id_guru        = $mysqli->escape_string($id_guru);
    $email          = $mysqli->escape_string($email);
    $nama           = strtoupper($mysqli->escape_string($nama));
    $tempat_lahir   = $mysqli->escape_string($tempat_lahir);
    $tanggal_lahir  = $mysqli->escape_string($tanggal_lahir);
    $jenis_kelamin  = $mysqli->escape_string($jenis_kelamin);
    $agama          = $mysqli->escape_string($agama);
    $no_telepon     = $mysqli->escape_string($no_telepon);
    // $id_provinsi    = $mysqli->escape_string($id_provinsi);
    // $id_kabupaten   = $mysqli->escape_string($id_kabupaten);
    // $id_kecamatan   = $mysqli->escape_string($id_kecamatan);
    // $id_kelurahan   = $mysqli->escape_string($id_kelurahan);
    $alamat = $mysqli->escape_string($alamat);
    $datetime       = date('Y-m-d H:i:s');
    $password       = password_hash($id_guru, PASSWORD_DEFAULT);

    $sql_update_guru = "UPDATE guru SET 
        id_guru         = '$id_guru',
        nama            = '$nama',
        tempat_lahir    = '$tempat_lahir',
        tanggal_lahir   = '$tanggal_lahir',
        jenis_kelamin   = '$jenis_kelamin',
        agama           = '$agama',
        no_telepon      = '$no_telepon',
        alamat          = '$alamat',
        date_update     = '$datetime'
        WHERE id_guru   = '$id_guru'
    ";

    $query_update_guru = $mysqli->query($sql_update_guru) or die($mysqli->error);

    $sql_update_akun_guru = "UPDATE akun SET 
        id_entity   = '$id_guru',
        email       = '$email',
        password    = '$password'
        WHERE id_entity = '$id_guru'
    ";

    $query_update_akun_guru = $mysqli->query($sql_update_akun_guru) or die($mysqli->error);

    header("location:index.php");
}

if (empty($id_guru)) header('location: index.php');

$sql = "SELECT guru.*, akun.* FROM guru, akun WHERE guru.id_guru = '$id_guru' AND akun.id_entity = '$id_guru'";
$query = $mysqli->query($sql);
$guru = $query->fetch_array();

if (empty($guru)) header('location: index.php');

include '../views/guru/v_tambah.php';
