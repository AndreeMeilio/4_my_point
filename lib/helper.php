<?php
    session_start();

    function cekLogin() {
        $email = @$_SESSION['email'];
        $id_hak_akses = @$_SESSION['id_hak_akses'];

        if (empty($email) AND empty($id_hak_akses)) {
            header("location:auth/login.php");
        }
    }

    function sudahLogin() {
        $email = @$_SESSION['email'];
        $id_hak_akses = @$_SESSION['id_hak_akses'];

        if (!empty($email) AND !empty($id_hak_akses)) {
            header("location:auth/login.php");
        }
    }
?>