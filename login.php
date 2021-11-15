<?php
    include 'lib/library.php';

    sudahLogin();

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role     = $_POST['role'];

        $sql = " SELECT *  FROM login WHERE username = '$username' AND password = SHA1('$password') AND role = '$role'";

        $data = $mysqli -> query($sql) or die($mysqli->error);

        if ($data->num_rows != 0)
        {
            $row = mysqli_fetch_object($data);
            $_SESSION['username'] = $row -> username;
            $_SESSION['role'] = $row -> role;
            $_SESSION['level'] = $row -> level;
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