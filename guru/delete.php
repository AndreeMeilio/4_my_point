<?php 
session_start();

include '../lib/library.php';
cekLogin();

if($_SESSION["nama_hak_akses"] === "guru" || $_SESSION["nama_hak_akses"] === "siswa"){
    header("location:index.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_guru = @$_POST['id_guru'];

    $id_guru = $mysqli->escape_string($id_guru);

    $sql_guru = "SELECT * FROM guru WHERE id_guru = '$id_guru'";
    $query_guru = $mysqli->query($sql_guru) or die();

    if ($query_guru->num_rows != 0){
        $sql_hapus_guru        = "DELETE FROM guru WHERE id_guru = '$id_guru'";
        $sql_hapus_akun_guru   = "DELETE FROM akun WHERE id_entity = '$id_guru'";

        $query_guru            = $mysqli->query($sql_hapus_guru) or die();
        $query_akun_guru       = $mysqli->query($sql_hapus_akun_guru) or die();

        header("location:index.php");
    } else {
        header("location:index.php");
    }
}

?>