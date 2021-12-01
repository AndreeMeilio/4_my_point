<?php

include '../lib/library.php';

$sql = " SELECT guru.*
            FROM guru
            ORDER BY nama";

$data_siswa = $mysqli->query($sql) or die($mysqli->error);

include '../views/guru/v_index.php';

?>