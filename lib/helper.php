<?php
    session_start();

    function cekLogin() {
        $email = @$_SESSION['email'];
        $nama_hak_akses = @$_SESSION['nama_hak_akses'];

        if (empty($email) AND empty($nama_hak_akses)) {
            header("location:/4_my_point/auth/login.php");
        }
    }

    function sudahLogin() {
        $email = @$_SESSION['email'];
        $nama_hak_akses = @$_SESSION['nama_hak_akses'];

        if (!empty($email) AND !empty($nama_hak_akses)) {
            header("location:/4_my_point/index.php");
        }
    }
?>