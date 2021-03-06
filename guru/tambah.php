<?php

include '../lib/library.php';
cekLogin();

if($_SESSION["nama_hak_akses"] === "guru" || $_SESSION["nama_hak_akses"] === "siswa"){
    header("location:index.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $id        = @$_POST['id'];
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
    $id        = $mysqli->escape_string($id);
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


    //Store data siswa ke dalam table siswa
    $sql_guru = "INSERT INTO guru VALUES(
        '$id', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin',
        '$agama', '$no_telepon', '$id_provinsi', '$id_kabupaten', '$id_kecamatan', '$id_kelurahan', '$alamat', '$datetime', '$datetime'
    )";

    $query_guru = $mysqli->query($sql_guru) or die($mysqli->error);

    //Mengambil data hak akses dari tabel hak akses dengan nama hak akses siswa;
    $sql_hak_akses      = "SELECT * FROM hak_akses WHERE nama_hak_akses = 'guru'";
    $query_hak_akses    = $mysqli->query($sql_hak_akses) or die();
    $data_hak_akses     = $query_hak_akses->fetch_assoc();
    $id_hak_akses       = $data_hak_akses['id_hak_akses'];
    $password_default   = password_hash($id, PASSWORD_DEFAULT);
    
    //store data email dan nis(password default) siswa kedalam tabel akun
    $id_akun    = uniqid('akn');
    $sql_akun   = "INSERT INTO akun VALUES(
        '$id_akun', '$id', '$id_hak_akses', '$email', '$password_default', NULL, '$datetime', '$datetime'
    )";

    $query_akun = $mysqli->query($sql_akun) or die($mysqli->error);

    if ($_FILES["foto"]["name"] != "" || $_FILES["foto"]["name"] != null){
        //Upload Foto
        $target_dir = "../assets/image/";
        $file_ext=strtolower(end(explode('.',$_FILES['foto']['name'])));
        $file_name = $id. date("Ymd"). ".". $file_ext;
        $target_file = $target_dir. $file_name;
        $file_tmp = $_FILES["foto"]["tmp_name"];
        $file_size = $_FILES["foto"]["size"];

        $extensions= array("jpeg","jpg","png");

        if (in_array($file_ext, $extensions) === true && $file_size < 2097152){
            $upload = move_uploaded_file($file_tmp, $target_file);

            if ($upload){
                $id_media = uniqid("md");
                $id_entity_penambah = $_SESSION['id_entity'];

                $sql_upload_media = "INSERT INTO media VALUES(
                    '". $id_media ."', '". $id . "', '". $id_entity_penambah ."', '". $file_name ."', '". $datetime ."', '". $datetime ."'
                )";

                $query_upload_media = $mysqli->query($sql_upload_media) or die($mysqli->error);

            } else {
                echo "gagal upload file";
                die();
            }

        } else {
            echo "format foto harus jpeg, jpg, atau png dan ukurannya harus dibawah 2 mb";
            die();
        }

    }

    header("location:index.php");
    
}

$sql_guru = "SELECT * FROM guru";
$data_guru = $mysqli->query($sql_guru) or die($mysqli->error);

include '../views/guru/v_tambah_edit.php';

?>