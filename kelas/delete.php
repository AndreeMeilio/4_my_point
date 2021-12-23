<?php 
include '../lib/library.php';
cekLogin();

include '../auth/authorization.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_kelas = @$_POST['id_kelas'];

    $id_kelas = $mysqli->escape_string($id_kelas);

    $sql_kelas = "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'";
    $query_kelas = $mysqli->query($sql_kelas) or die();

    if ($query_kelas->num_rows != 0){
        $sql_hapus_kelas        = "DELETE FROM kelas WHERE id_kelas = '$id_kelas'";
        $query_kelas            = $mysqli->query($sql_hapus_kelas) or die();
        header("location:index.php");
    } else {
        header("location:index.php");
    }
}

?>