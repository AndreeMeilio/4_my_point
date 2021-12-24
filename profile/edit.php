<?php

include '../lib/library.php';
cekLogin();

$id_entity = @$_GET["id_entity"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id             = @$_POST['id'];
    $email          = @$_POST['email'];
    $nama           = @$_POST['nama'];

    $id_kelas = "";
    if ($_SESSION["nama_hak_akses"] === "siswa") {
        $id_kelas       = @$_POST['id_kelas'];
    }

    $tempat_lahir   = @$_POST['tempat_lahir'];
    $tanggal_lahir  = @$_POST['tanggal_lahir'];
    $jenis_kelamin  = @$_POST['jenis_kelamin'];
    $agama          = @$_POST['agama'];
    $no_telepon          = @$_POST['no_telepon'];
    $id_provinsi    = '-';
    $id_kabupaten   = '-';
    $id_kecamatan   = '-';
    $id_kelurahan   = '-';
    $alamat         = @$_POST['alamat'];

    // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
    $id             = $mysqli->escape_string($id);
    $email          = $mysqli->escape_string($email);
    $id_kelas       = $mysqli->escape_string($id_kelas);
    $nama           = strtoupper($mysqli->escape_string($nama));
    $tempat_lahir   = $mysqli->escape_string($tempat_lahir);
    $tanggal_lahir  = $mysqli->escape_string($tanggal_lahir);
    $jenis_kelamin  = $mysqli->escape_string($jenis_kelamin);
    $agama          = $mysqli->escape_string($agama);
    $no_telepon          = $mysqli->escape_string($no_telepon);
    // $id_provinsi    = $mysqli->escape_string($id_provinsi);
    // $id_kabupaten   = $mysqli->escape_string($id_kabupaten);
    // $id_kecamatan   = $mysqli->escape_string($id_kecamatan);
    // $id_kelurahan   = $mysqli->escape_string($id_kelurahan);
    $alamat = $mysqli->escape_string($alamat);
    $datetime       = date('Y-m-d H:i:s');
    // $password       = password_hash($id, PASSWORD_DEFAULT);

    $sql_update = "";
    
    if ($_SESSION["nama_hak_akses"] === "admin") {

        $sql_update = "UPDATE admin SET 
                id              = '$id',
                nama            = '$nama',
                tempat_lahir    = '$tempat_lahir',
                tanggal_lahir   = '$tanggal_lahir',
                jenis_kelamin   = '$jenis_kelamin',
                agama           = '$agama',
                no_telepon      = '$no_telepon',
                alamat          = '$alamat',
                date_update     = '$datetime'
                WHERE id        = '$id_entity'";

    } else if ($_SESSION["nama_hak_akses"] === "guru") {

        $sql_update = "UPDATE guru SET 
                id              = '$id',
                nama            = '$nama',
                tempat_lahir    = '$tempat_lahir',
                tanggal_lahir   = '$tanggal_lahir',
                jenis_kelamin   = '$jenis_kelamin',
                agama           = '$agama',
                no_telepon      = '$no_telepon',
                alamat          = '$alamat',
                date_update     = '$datetime'
                WHERE id        = '$id_entity'";

    } else if ($_SESSION["nama_hak_akses"] === "siswa") {

        $sql_update = "UPDATE siswa SET 
                id              = '$id',
                id_kelas        = '$id_kelas',
                nama            = '$nama',
                tempat_lahir    = '$tempat_lahir',
                tanggal_lahir   = '$tanggal_lahir',
                jenis_kelamin   = '$jenis_kelamin',
                agama           = '$agama',
                no_telepon      = '$no_telepon',
                alamat          = '$alamat',
                date_update     = '$datetime'
                WHERE id        = '$id_entity'";
    }

    $sql_update_akun = "UPDATE akun SET 
                        email = '". $email. "' WHERE id_entity = '". $id_entity. "',
                        id_entity = '". $id_entity. "'";

    $query_update = $mysqli->query($sql_update) or die($mysqli->error);
    $query_update_akun = $mysqli->query($sql_update_akun) or die($mysqli->error);

    header("location: index.php");
} else {

    $sql = "";
    $data_kelas = null;

    if ($_SESSION["nama_hak_akses"] === "admin") {

        $sql = "SELECT admin.*, akun.* FROM admin
                LEFT JOIN akun ON admin.id = akun.id_entity
                WHERE admin.id = '" . $id_entity . "'";
    } else if ($_SESSION["nama_hak_akses"] === "guru") {

        $sql = "SELECT guru.*, akun.* FROM guru
                LEFT JOIN akun ON guru.id = akun.id_entity
                WHERE guru.id = '" . $id_entity . "'";
    } else if ($_SESSION["nama_hak_akses"] === "siswa") {

        $sql = "SELECT siswa.*, akun.* FROM siswa
                LEFT JOIN akun ON siswa.id = akun.id_entity
                WHERE siswa.id = '" . $id_entity . "'";

        $sql_kelas = "SELECT * FROM kelas";
        $data_kelas = $mysqli->query($sql_kelas) or die($mysqli->error);
    }

    $query = $mysqli->query($sql) or die();
    $data_profile = $query->fetch_assoc();

    include '../views/profile/v_edit.php';
}
