<?php
    include 'helper.php';

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = '4_my_point';

    $mysqli = mysqli_connect($host, $user, $pass, $db)
            or die('Tidak dapat koneksi ke Database');
?>