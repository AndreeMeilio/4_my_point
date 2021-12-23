<?php 

include '../lib/library.php';

$sql = "SELECT * FROM kelas";
$data_kelas = $mysqli->query($sql) or die();


include '../views/kelas/v_index.php';
?>