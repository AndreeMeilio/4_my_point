<?php 

include '../lib/library.php';
cekLogin();
include '../auth/authorization.php';

$id_penghargaan = @$_GET['id_penghargaan'];

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = @$_POST['id'];
    $nama_penghargaan = @$_POST['nama_penghargaan'];
    $penyelenggara = @$_POST['penyelenggara'];
    $tingkat   = @$_POST['tingkat'];
    $peringkat = @$_POST['peringkat'];

    // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
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
    $datetime       = date('Y-m-d H:i:s');

    $sql_penghargaan = "SELECT * FROM penghargaan WHERE id_penghargaan = '". $id_penghargaan. "'";
    $query_penghargaan = $mysqli->query($sql_penghargaan) or die($mysqli->error);
    $data_penghargaan = $query_penghargaan->fetch_assoc();

    $sql_current_poin = "SELECT poin FROM siswa WHERE id = '". $data_penghargaan["id_siswa"]. "'";
    $query_current_poin = $mysqli->query($sql_current_poin) or die($mysqli->error);
    $current_poin = $query_current_poin->fetch_assoc();

    $total_poin = ($current_poin['poin'] - $data_penghargaan['poin_penambah']) + $poin_penambahan;

    $sql_update_poin_siswa = "UPDATE siswa SET poin = ". $total_poin ." WHERE id = '". $data_penghargaan["id_siswa"] ."';";

    $sql_update_penghargaan = "UPDATE penghargaan SET 
                                nama_penghargaan = '". $nama_penghargaan. "',
                                penyelenggara = '". $penyelenggara. "',
                                tingkat = '". $tingkat. "',
                                peringkat = '". $peringkat."',
                                poin_penambah = '". $poin_penambahan. "'
                                WHERE id_penghargaan = '". $id_penghargaan. "'";
    
    $query_update_poin_siswa = $mysqli->query($sql_update_poin_siswa) or die($mysqli->error);
    $query_update_penghargaan = $mysqli->query($sql_update_penghargaan) or die($mysqli->error);

    header("location:index.php");

} else {

    $sql_siswa = "SELECT * FROM siswa";
    $data_siswa = $mysqli->query($sql_siswa) or die($mysqli->error);

    $sql_penghargaan = "SELECT * FROM penghargaan WHERE id_penghargaan = '". $id_penghargaan. "'";
    $query_penghargaan = $mysqli->query($sql_penghargaan) or die($mysqli->error); 

    $data_penghargaan = $query_penghargaan->fetch_assoc();

    include '../views/penghargaan/v_tambah_edit.php';
}
