<?php 

include '../lib/library.php';
cekLogin();

$sql = "SELECT * FROM kelas";
$data_kelas = $mysqli->query($sql) or die();

$result = [];
while($res = $data_kelas->fetch_assoc()){
    $result[] = $res;
}

include '../views/kelas/v_index.php';
?>