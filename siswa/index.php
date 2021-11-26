<?php

include '../lib/library.php';

$sql = " SELECT siswa.*, kelas.*
                FROM siswa INNER JOIN kelas 
                ON siswa.id_kelas = kelas.id_kelas";

$data_siswa = $mysqli->query($sql) or die($mysqli->error);

include '../views/siswa/v_index.php';

?>