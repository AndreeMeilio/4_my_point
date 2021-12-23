<?php 

include '../lib/library.php';

$id_siswa = @$_GET['nis'];

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $nis            = @$_POST['nis'];
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
    $nis            = $mysqli->escape_string($nis);
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
    $password       = password_hash($nis, PASSWORD_DEFAULT);

    $sql_update_siswa = "UPDATE siswa SET 
        id_siswa        = '$nis',
        id_kelas        = '$id_kelas',
        nama            = '$nama',
        tempat_lahir    = '$tempat_lahir',
        tanggal_lahir   = '$tanggal_lahir',
        jenis_kelamin   = '$jenis_kelamin',
        agama           = '$agama',
        alamat          = '$alamat',
        date_update     = '$datetime'
        WHERE id_siswa  = '$id_siswa'
    ";

    $query_update_siswa = $mysqli->query($sql_update_siswa) or die($mysqli->error);

    $sql_update_akun_siswa = "UPDATE akun SET 
        id_entity   = '$nis',
        email       = '$email',
        password    = '$password'
        WHERE id_entity = '$id_siswa'
    ";

    $query_update_akun_siswa = $mysqli->query($sql_update_akun_siswa) or die($mysqli->error);

    header("location:index.php");

} else {
    $sql = "SELECT siswa.*, akun.* FROM siswa
            INNER JOIN akun ON siswa.id_siswa = akun.id_entity
            WHERE siswa.id_siswa = '$id_siswa'";

    $query      = $mysqli->query($sql) or die($mysqli->error);

    $data_siswa = $query->fetch_assoc();

    $sql_kelas  = "SELECT * FROM kelas";
    $data_kelas      = $mysqli->query($sql_kelas) or die($mysqli->error);

    include '../views/siswa/v_tambah_edit.php';
}

?>
