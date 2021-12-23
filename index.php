<?php
    include 'lib/library.php';

    cekLogin();
    
    include 'views/v_index.php';

    // if($_SESSION['nama_hak_akses'] == 'admin' || $_SESSION['nama_hak_akses'] == 'guru') {
    //     include 'views/v_index.php';
    // } 
    // elseif ($_SESSION['nama_hak_akses'] == 'siswa') {
        // include 'views/v_index_user.php';
    // }
?>