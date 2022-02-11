<?php

include '../lib/library.php';
cekLogin();

if ($_SESSION["nama_hak_akses"] === "siswa"){
    header("location:/4_my_point/index.php");
}

$sql = " SELECT guru.*
            FROM guru
            ORDER BY nama ASC";

$data_guru = $mysqli->query($sql) or die($mysqli->error);

$result = [];

while($res = $data_guru->fetch_assoc()){
    $result[] = $res;
}

include '../views/guru/v_index.php';

?>