<?php

include '../lib/library.php';
cekLogin();

$sql = " SELECT siswa.*, 
COUNT(pelanggaran.id_pelanggaran) as total_pelanggaran
FROM siswa, pelanggaran
WHERE siswa.id = pelanggaran.id_siswa GROUP BY id;";

$data_pelanggaran_siswa = $mysqli->query($sql) or die($mysqli->error);

$result = [];

while ($res = $data_pelanggaran_siswa->fetch_assoc()){
    $result[] = $res;
}

include '../views/pelanggaran/v_index.php';

?>