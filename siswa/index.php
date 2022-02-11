<?php

include '../lib/library.php';
cekLogin();

$id_kelas = @$_GET["id_kelas"];
$sql = "";

if (!empty($id_kelas)){

    $sql = " SELECT siswa.*, kelas.*
    FROM siswa LEFT JOIN kelas 
    ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas = '". $id_kelas. "' ORDER BY nama ASC";

} else {
    $sql = " SELECT siswa.*, kelas.*
    FROM siswa LEFT JOIN kelas 
    ON siswa.id_kelas = kelas.id_kelas ORDER BY nama ASC";
}

$sql_kelas = "SELECT * FROM kelas";

$data_siswa = $mysqli->query($sql) or die($mysqli->error);
$data_kelas = $mysqli->query($sql_kelas) or die($mysqli->error);

$result = [];

while($item = $data_siswa->fetch_assoc()){
    $result[] = $item;
}

include '../views/siswa/v_index.php';

?>