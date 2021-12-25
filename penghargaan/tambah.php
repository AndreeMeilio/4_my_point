<?php

include '../lib/library.php';
cekLogin();

include '../auth/authorization.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = @$_POST['id'];
    $nama_penghargaan = @$_POST['nama_penghargaan'];
    $penyelenggara = @$_POST['penyelenggara'];
    $tingkat   = @$_POST['tingkat'];
    $peringkat = @$_POST['peringkat'];


    // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
    $id_penghargaan = uniqid("phrgn");
    $id = $mysqli->escape_string($id);
    $nama_penghargaan = $mysqli->escape_string($nama_penghargaan);
    $penyelenggara = $mysqli->escape_string($penyelenggara);
    $tingkat = $mysqli->escape_string($tingkat);
    $peringkat = $mysqli->escape_string($peringkat);
    $poin_penambahan = 0;

    if ($tingkat === "kota"){
        $poin_penambahan = 15;
    } else if ($tingkat === "provinsi"){
        $poin_penambahan = 25;
    } else if ($tingkat === "nasional"){
        $poin_penambahan = 35;
    } else if ($tingkat === "international"){
        $poin_penambahan = 50;
    }

    $id_entity_penambah = $_SESSION["id_entity"];
    $datetime       = date('Y-m-d H:i:s');

    //Store data siswa ke dalam table siswa
    $sql_penghargaan = "INSERT INTO penghargaan VALUES(
        '$id_penghargaan', '$id', '$id_entity_penambah', '$nama_penghargaan', '$penyelenggara',
        '$tingkat', '$peringkat', '$poin_penambahan' ,'$datetime', '$datetime'
    )";

    $query_penghargaan = $mysqli->query($sql_penghargaan) or die($mysqli->error);

    $sql_update_poin_siswa = "UPDATE siswa SET poin = (SELECT poin FROM siswa WHERE id = '". $id ."') + ". $poin_penambahan ." WHERE id = '". $id ."';";

    $query_update_poin_siswa = $mysqli->query($sql_update_poin_siswa) or die($mysqli->error);

    header("location:index.php");
    
}

$sql_siswa = "SELECT * FROM siswa";
$data_siswa = $mysqli->query($sql_siswa) or die($mysqli->error);


include '../views/penghargaan/v_tambah_edit.php';

?>