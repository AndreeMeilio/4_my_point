<?php

include '../lib/library.php';
cekLogin();

$sql = " SELECT siswa.*, 
COUNT(pelanggaran.id_pelanggaran) as total_pelanggaran
FROM siswa, pelanggaran
WHERE siswa.id_siswa = pelanggaran.id_siswa GROUP BY id_siswa;";

$data_pelanggaran_siswa = $mysqli->query($sql) or die($mysqli->error);

include '../views/pelanggaran/v_index.php';

?>