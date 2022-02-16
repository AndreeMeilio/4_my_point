<?php 

include '../lib/library.php';
cekLogin();

include '../auth/authorization.php';

$id_jenis_pelanggaran = @$_GET["jenis_pelanggaran"];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $desc_pelanggaran   = @$_POST["desc_pelanggaran"];
    $poin_pelanggaran   = @$_POST["poin_pelanggaran"];
    $datetime           = date("Y-m-d H:i:s");

    $desc_pelanggaran   = $mysqli->escape_string($desc_pelanggaran);
    $poin_pelanggaran   = $mysqli->escape_string($poin_pelanggaran);

    $sql_edit_jenis_pelanggaran = "UPDATE jenis_pelanggaran SET 
        desc_pelanggaran = '$desc_pelanggaran',
        poin_pelanggaran = '$poin_pelanggaran',
        date_update = '$datetime'
        WHERE id_jenis_pelanggaran = '$id_jenis_pelanggaran'
    ";

    $query_edit_jenis_pelanggaran = $mysqli->query($sql_edit_jenis_pelanggaran) or die($mysqli->error);

    header("location:index.php");
} else {
    $sql_jenis_pelanggaran = "SELECT * FROM jenis_pelanggaran WHERE id_jenis_pelanggaran = '$id_jenis_pelanggaran'";
    $query_jenis_pelanggaran = $mysqli->query($sql_jenis_pelanggaran) or die($mysqli->error);

    $data_jenis_pelanggaran = $query_jenis_pelanggaran->fetch_assoc();
    include '../views/jenis_pelanggaran/v_tambah_edit.php';
}

?>