<?php
    include 'lib/library.php';

    cekLogin();

    if($_SESSION['id_hak_akses'] == '3') {
        include 'views/v_index.php';
    } elseif ($_SESSION['id_hak_akses'] == '1') {
        include 'views/v_index_user.php';
    }
?>