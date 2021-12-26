<?php
    include '../lib/library.php';

    sudahLogin();

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email          = $_POST['email'];
        $password       = $_POST['password'];
        $id_hak_akses   = $_POST['id_hak_akses'];

        // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
        $email          = $mysqli->escape_string($email);
        $password       = $mysqli->escape_string($password);
        $id_hak_akses   = $mysqli->escape_string($id_hak_akses);

        $sql = "SELECT akun.*, hak_akses.nama_hak_akses 
                FROM akun LEFT JOIN hak_akses 
                ON akun.id_hak_akses = hak_akses.id_hak_akses
                WHERE akun.email = '$email'
                AND akun.id_hak_akses = '$id_hak_akses'";


        $data = $mysqli -> query($sql) or die($mysqli->error);

        if ($data->num_rows != 0)
        {
            $row = mysqli_fetch_object($data);
            
            if (password_verify($password, $row->password)){
                $_SESSION['email'] = $row -> email;
                $_SESSION['id_entity'] = $row->id_entity;
                $_SESSION['nama_hak_akses'] = $row -> nama_hak_akses;
                
                $session_nama = "";
                $foto = "";

                if ($_SESSION['nama_hak_akses'] === "admin"){
                    $sql_admin = "SELECT admin.nama, media.nama_media FROM admin LEFT JOIN media ON admin.id = media.id_entity WHERE id = '". $_SESSION['id_entity']. "';";

                    $query = $mysqli->query($sql_admin) or die($mysqli->error);

                    $data_nama_foto = $query->fetch_assoc();
                    $session_nama = $data_nama_foto["nama"];
                    $foto = $data_nama_foto["nama_media"] != null ? $data_nama_foto["nama_media"] : "avatar.jpg";
                } else if ($_SESSION['nama_hak_akses'] === "guru"){
                    $sql_guru = "SELECT guru.nama, media.nama_media FROM guru LEFT JOIN media ON guru.id = media.id_entity WHERE id = '". $_SESSION['id_entity']. "';";

                    $query = $mysqli->query($sql_guru) or die($mysqli->error);

                    $data_nama_foto = $query->fetch_assoc();
                    $session_nama = $data_nama_foto["nama"];
                    $foto = $data_nama_foto["nama_media"] != null ? $data_nama_foto["nama_media"] : "avatar.jpg";
                } else if ($_SESSION['nama_hak_akses'] === "siswa"){
                    $sql_guru = "SELECT siswa.nama, media.nama_media FROM siswa LEFT JOIN media ON siswa.id = media.id_entity WHERE id = '". $_SESSION['id_entity']. "';";

                    $query = $mysqli->query($sql_guru) or die($mysqli->error);
                    $data_nama_foto = $query->fetch_assoc();

                    $session_nama = $data_nama_foto["nama"];
                    $foto = $data_nama_foto["nama_media"] != null ? $data_nama_foto["nama_media"] : "avatar.jpg";
                }

                $_SESSION["nama"] = $session_nama;
                $_SESSION["foto"] = $foto;

                header('location:../index.php');
            } else {
                $error ="Credentials Does Not Match Any Record";
                echo "<span style='color:red;'>".$error."</span>";
            }
        }
        else
        {
            $error ="Credentials Does Not Match Any Record";
            echo "<span style='color:red;'>".$error."</span>";
        }
    }


    //Mengambil data hak akses untuk dipakai di form pada bagian masuk sebagai
    $sql_hak_akses = "SELECT * FROM hak_akses";
    $query_hak_akses = $mysqli->query($sql_hak_akses) or die($mysqli->error);


    include '../views/v_login.php';
