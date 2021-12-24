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

                if ($_SESSION['nama_hak_akses'] === "admin"){
                    $sql_admin = "SELECT nama FROM admin WHERE id = '". $_SESSION['id_entity']. "';";

                    $query = $mysqli->query($sql_admin) or die($mysqli->error);
                    $session_nama = $query->fetch_assoc()["nama"];
                } else if ($_SESSION['nama_hak_akses'] === "guru"){
                    $sql_guru = "SELECT nama FROM guru WHERE id = '". $_SESSION['id_entity']. "';";

                    $query = $mysqli->query($sql_guru) or die($mysqli->error);
                    $session_nama = $query->fetch_assoc()["nama"];
                } else if ($_SESSION['nama_hak_akses'] === "siswa"){
                    $sql_guru = "SELECT nama FROM siswa WHERE id = '". $_SESSION['id_entity']. "';";

                    $query = $mysqli->query($sql_guru) or die($mysqli->error);
                    $session_nama = $query->fetch_assoc()["nama"];
                }

                $_SESSION["nama"] = $session_nama;

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
