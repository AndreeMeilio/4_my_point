<?php 
session_start();

include '../lib/library.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_siswa = @$_POST['id_siswa'];

    $id_siswa = $mysqli->escape_string($id_siswa);

    $sql_siswa = "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'";
    $query_siswa = $mysqli->query($sql_siswa) or die();

    if ($query_siswa->num_rows != 0){
        $sql_hapus_siswa        = "DELETE FROM siswa WHERE id_siswa = '$id_siswa'";
        $sql_hapus_akun_siswa   = "DELETE FROM akun WHERE id_entity = '$id_siswa'";

        $query_siswa            = $mysqli->query($sql_hapus_siswa) or die();
        $query_akun_siswa       = $mysqli->query($sql_hapus_akun_siswa) or die();

        header("location:index.php");
    } else {
        header("location:index.php");
    }
}

?>