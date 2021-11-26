<?php

include '../lib/library.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $id_siswa       = @$_POST['nis'];
    $email          = @$_POST['email'];
    $id_kelas       = @$_POST['id_kelas'];
    $nama           = @$_POST['nama'];
    $tempat_lahir   = @$_POST['tempat_lahir'];
    $tanggal_lahir  = @$_POST['tanggal_lahir'];
    $jenis_kelamin  = @$_POST['jenis_kelamin'];
    $agama          = @$_POST['agama'];
    $id_provinsi    = '-';
    $id_kabupaten   = '-';
    $id_kecamatan   = '-';
    $id_kelurahan   = '-';
    $alamat         = @$_POST['alamat'];


    // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
    $id_siswa       = $mysqli->escape_string($id_siswa);
    $email          = $mysqli->escape_string($email);
    $id_kelas       = $mysqli->escape_string($id_kelas);
    $nama           = strtoupper($mysqli->escape_string($nama));
    $tempat_lahir   = $mysqli->escape_string($tempat_lahir);
    $tanggal_lahir  = $mysqli->escape_string($tanggal_lahir);
    $jenis_kelamin  = $mysqli->escape_string($jenis_kelamin);
    $agama          = $mysqli->escape_string($agama);
    // $id_provinsi    = $mysqli->escape_string($id_provinsi);
    // $id_kabupaten   = $mysqli->escape_string($id_kabupaten);
    // $id_kecamatan   = $mysqli->escape_string($id_kecamatan);
    // $id_kelurahan   = $mysqli->escape_string($id_kelurahan);
    $alamat = $mysqli->escape_string($alamat);
    $datetime       = date('Y-m-d H:i:s');


    //Store data siswa ke dalam table siswa
    $sql_siswa = "INSERT INTO siswa VALUES(
        '$id_siswa', '$id_kelas', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin',
        '$agama', '$id_provinsi', '$id_kabupaten', '$id_kecamatan', '$id_kelurahan', '$alamat', '$datetime', '$datetime'
    )";

    $query_siswa = $mysqli->query($sql_siswa) or die($mysqli->error);

    //Mengambil data hak akses dari tabel hak akses dengan nama hak akses siswa;
    $sql_hak_akses      = "SELECT * FROM hak_akses WHERE nama_hak_akses = 'siswa'";
    $query_hak_akses    = $mysqli->query($sql_hak_akses) or die();
    $data_hak_akses     = $query_hak_akses->fetch_assoc();
    $id_hak_akses       = $data_hak_akses['id_hak_akses'];
    $password_default   = password_hash($id_siswa, PASSWORD_DEFAULT);
    
    //store data email dan nis(password default) siswa kedalam tabel akun
    $id_akun    = uniqid('akn');
    $sql_akun   = "INSERT INTO akun VALUES(
        '$id_akun', '$id_siswa', '$id_hak_akses', '$email', '$password_default', NULL, '$datetime', '$datetime'
    )";

    $query_akun = $mysqli->query($sql_akun) or die($mysqli->error);

    header("location:index.php");
    
}

$sql_kelas = "SELECT * FROM kelas";
$data_kelas = $mysqli->query($sql_kelas) or die($mysqli->error);

include '../views/siswa/v_tambah.php';

?>