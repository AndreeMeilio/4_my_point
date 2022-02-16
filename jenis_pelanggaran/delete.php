<?php 

include '../lib/library.php';
cekLogin();

if($_SESSION["nama_hak_akses"] === "guru" || $_SESSION["nama_hak_akses"] === "siswa"){
    header("location:index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_jenis_pelanggaran = @$_POST["id_jenis_pelanggaran"];

    $id_jenis_pelanggaran = $mysqli->escape_string($id_jenis_pelanggaran);

    $sql_hapus_jenis_pelanggaran = "DELETE FROM jenis_pelanggaran WHERE id_jenis_pelanggaran = '$id_jenis_pelanggaran'";
    $query_hapus_jenis_pelanggaran = $mysqli->query($sql_hapus_jenis_pelanggaran) or die($mysqli->error);

    header("location:index.php");
}

?>