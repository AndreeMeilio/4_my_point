<?php
    include 'lib/library.php';

    sudahLogin();

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id_hak_akses     = $_POST['id_hak_akses'];

        $sql = " SELECT *  FROM akun WHERE email = '$email' AND password = SHA1('$password') AND id_hak_akses = '$id_hak_akses'";

        $data = $mysqli -> query($sql) or die($mysqli->error);

        if ($data->num_rows != 0)
        {
            $row = mysqli_fetch_object($data);
            $_SESSION['email'] = $row -> email;
            $_SESSION['id_hak_akses'] = $row -> id_hak_akses;
            header('location:index.php');
        }
        else
        {
            $error ="Username atau Password salah";
            echo "<span style='color:red;'>".$error."</span>";
        }
    }

    include 'views/v_login.php';
?>