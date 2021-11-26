<?php 

include '../lib/library.php';

$sql    = "SELECT * FROM jenis_pelanggaran";
$data_jenis_pelanggaran  = $mysqli->query($sql) or die($sql);

include '../views/jenis_pelanggaran/v_index.php';

?>