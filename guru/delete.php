<?php 
session_start();

include '../lib/library.php';
cekLogin();

if($_SESSION["nama_hak_akses"] === "guru" || $_SESSION["nama_hak_akses"] === "siswa"){
    header("location:index.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = @$_POST['id'];

    $id = $mysqli->escape_string($id);

    $sql_guru = "SELECT * FROM guru WHERE id = '$id'";
    $query_guru = $mysqli->query($sql_guru) or die();

    if ($query_guru->num_rows != 0){
        $sql_hapus_guru        = "DELETE FROM guru WHERE id = '$id'";
        $sql_hapus_akun_guru   = "DELETE FROM akun WHERE id_entity = '$id'";

        $query_guru            = $mysqli->query($sql_hapus_guru) or die();
        $query_akun_guru       = $mysqli->query($sql_hapus_akun_guru) or die();

        header("location:index.php");
    } else {
        header("location:index.php");
    }
}

?>