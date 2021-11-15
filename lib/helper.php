<?php
    session_start();

    function cekLogin() {
        $username = @$_SESSION['username'];
        $level    = @$_SESSION['level'];
        $role    = @$_SESSION['role'];

        if (empty($username) AND empty($level) AND empty($role)) {
            header("location:login.php");
        }
    }

    function sudahLogin() {
        $username = @$_SESSION['username'];
        $level    = @$_SESSION['level'];
        $role    = @$_SESSION['role'];

        if (!empty($username) AND !empty($level) AND !empty($role)) {
            header("location:login.php");
        }
    }
?>