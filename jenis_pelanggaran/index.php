<?php 

include '../lib/library.php';
cekLogin();

$sql    = "SELECT * FROM jenis_pelanggaran";
$data_jenis_pelanggaran  = $mysqli->query($sql) or die($sql);

$result = [];

while ($res = $data_jenis_pelanggaran->fetch_assoc()){
    $result[] = $res;
}

include '../views/jenis_pelanggaran/v_index.php';

?>