<?php

include '../lib/library.php';
cekLogin();

$sql = "";

if ($_SESSION["nama_hak_akses"] === "admin"){

    $sql = "SELECT admin.*, akun.*, media.nama_media FROM admin
            LEFT JOIN akun ON admin.id = akun.id_entity 
            LEFT JOIN media ON admin.id = media.id_entity
            WHERE admin.id = '". $_SESSION['id_entity']. "'";

} else if ($_SESSION["nama_hak_akses"] === "guru"){

    $sql = "SELECT guru.*, akun.*, media.nama_media FROM guru
            LEFT JOIN akun ON guru.id = akun.id_entity 
            LEFT JOIN media ON guru.id = media.id_entity
            WHERE guru.id = '". $_SESSION['id_entity']. "'";

} else if ($_SESSION["nama_hak_akses"] === "siswa"){

    $sql = "SELECT siswa.*, akun.*, kelas.*, media.nama_media FROM siswa
            LEFT JOIN akun ON siswa.id = akun.id_entity
            LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas 
            LEFT JOIN media ON siswa.id = media.id_entity
            WHERE siswa.id = '". $_SESSION['id_entity']. "'";

}

$query = $mysqli->query($sql) or die($mysqli->error);

$data_profile = $query->fetch_assoc();

include '../views/profile/v_index.php';

?>