<?php

include '../lib/library.php';
cekLogin();

$sql = " SELECT siswa.*, 
COUNT(penghargaan.id_penghargaan) as total_penghargaan
FROM siswa, penghargaan
WHERE siswa.id = penghargaan.id_siswa GROUP BY id;";

$data_penghargaan_siswa = $mysqli->query($sql) or die($mysqli->error);

include '../views/penghargaan/v_index.php';

?>