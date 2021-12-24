<?php 
session_start();

include '../lib/library.php';
cekLogin();

include '../auth/authorization.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = @$_POST['id'];

    $id = $mysqli->escape_string($id);

    $sql_siswa = "SELECT * FROM siswa WHERE id = '$id'";
    $query_siswa = $mysqli->query($sql_siswa) or die();

    if ($query_siswa->num_rows != 0){
        $sql_hapus_siswa        = "DELETE FROM siswa WHERE id = '$id'";
        $sql_hapus_akun_siswa   = "DELETE FROM akun WHERE id_entity = '$id'";

        $query_siswa            = $mysqli->query($sql_hapus_siswa) or die();
        $query_akun_siswa       = $mysqli->query($sql_hapus_akun_siswa) or die();

        header("location:index.php");
    } else {
        header("location:index.php");
    }
}

?>