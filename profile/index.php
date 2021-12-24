<?php

include '../lib/library.php';
cekLogin();

$sql = "";

if ($_SESSION["nama_hak_akses"] === "admin"){

    $sql = "SELECT admin.*, akun.* FROM admin
            LEFT JOIN akun ON admin.id = akun.id_entity 
            WHERE admin.id = '". $_SESSION['id_entity']. "'";

} else if ($_SESSION["nama_hak_akses"] === "guru"){

    $sql = "SELECT guru.*, akun.* FROM guru
            LEFT JOIN akun ON guru.id = akun.id_entity 
            WHERE guru.id = '". $_SESSION['id_entity']. "'";

} else if ($_SESSION["nama_hak_akses"] === "siswa"){

    $sql = "SELECT siswa.*, akun.*, kelas.* FROM siswa
            LEFT JOIN akun ON siswa.id = akun.id_entity
            LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas 
            WHERE siswa.id = '". $_SESSION['id_entity']. "'";

}

$query = $mysqli->query($sql) or die($mysqli->error);

$data_profile = $query->fetch_assoc();

include '../views/profile/v_index.php';

?>