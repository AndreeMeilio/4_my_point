<?php

include '../lib/library.php';
cekLogin();

include '../auth/authorization.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_penghargaan = @$_POST["id_penghargaan"];
    $id_penghargaan = $mysqli->escape_string($id_penghargaan);

    $sql_poin_penambah = "SELECT * FROM penghargaan WHERE id_penghargaan = '". $id_penghargaan. "'";
    $query_poin_penambah = $mysqli->query($sql_poin_penambah) or die($mysqli->error);

    $data_penghargaan = $query_poin_penambah->fetch_assoc();

    $sql_current_poin = "SELECT poin FROM siswa WHERE id = '". $data_penghargaan["id_siswa"]. "'";
    $query_current_poin = $mysqli->query($sql_current_poin) or die($mysqli->error);
    $current_poin = $query_current_poin->fetch_assoc();

    $total_poin = $current_poin['poin'] - $data_penghargaan["poin_penambah"];

    $sql_update_poin = "UPDATE siswa SET poin = ". $total_poin ." WHERE id = '" . $data_penghargaan["id_siswa"]. "'";

    $query_update_poin = $mysqli->query($sql_update_poin) or die($mysqli->error);

    $sql_delete_penghargaan = "DELETE FROM penghargaan WHERE id_penghargaan = '". $id_penghargaan. "'";
    $query_delete_penghargaan = $mysqli->query($sql_delete_penghargaan) or die($mysqli->error);

    header("location: detail.php?nis=". $data_penghargaan["id_siswa"]);
}

?>