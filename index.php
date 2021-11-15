<?php
    include 'lib/library.php';

    cekLogin();

    if($_SESSION['role'] == 'admin') {
        include 'views/v_index.php';
    } elseif ($_SESSION['role'] == 'user') {
        include 'views/v_index_user.php';
    }
?>