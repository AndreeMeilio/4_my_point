<?php

include '../lib/library.php';
cekLogin();

include '../auth/authorization.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_pelanggaran = @$_POST["id_pelanggaran"];
    $id_pelanggaran = $mysqli->escape_string($id_pelanggaran);

    $sql_poin_pengurangan = "SELECT * FROM pelanggaran WHERE id_pelanggaran = '". $id_pelanggaran. "'";
    $query_poin_pengurangan = $mysqli->query($sql_poin_pengurangan) or die($mysqli->error);

    $data_pelanggaran = $query_poin_pengurangan->fetch_assoc();

    $sql_update_poin = "UPDATE siswa SET poin = (SELECT poin FROM siswa WHERE id ='". $data_pelanggaran["id_siswa"]. "') + ". $data_pelanggaran["poin_pengurangan"] ." WHERE id = '" . $data_pelanggaran["id_siswa"]. "'";

    $query_update_poin = $mysqli->query($sql_update_poin) or die($mysqli->error);

    $sql_delete_pelanggaran = "DELETE FROM pelanggaran WHERE id_pelanggaran = '". $id_pelanggaran. "'";
    $query_delete_pelanggaran = $mysqli->query($sql_delete_pelanggaran) or die($mysqli->error);

    header("location: detail.php?nis=". $data_pelanggaran["id_siswa"]);
}

?>