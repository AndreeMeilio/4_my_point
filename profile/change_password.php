<?php

include '../lib/library.php';
cekLogin();

$id_entity = @$_GET["id_entity"];
$succes;
$error;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $current_password = @$_POST["current_password"];
    $new_password = @$_POST["new_password"];
    $confirm_password = @$_POST["confirm_password"];

    $current_password = $mysqli->escape_string($current_password);
    $new_password = $mysqli->escape_string($new_password);
    $confirm_password = $mysqli->escape_string($confirm_password);

    $sql_data_akun = "SELECT * FROM akun WHERE id_entity = '". $id_entity. "'";
    $query_data_akun = $mysqli->query($sql_data_akun) or die();

    $data_akun = $query_data_akun->fetch_assoc();

    if (password_verify($current_password, $data_akun["password"])){
        if ($new_password == $confirm_password){
            $confirm_password = password_hash($confirm_password, PASSWORD_DEFAULT);

            $sql_update_password = "UPDATE akun SET password = '". $confirm_password. "' WHERE id_entity = '". $id_entity. "'";

            $query_update_password = $mysqli->query($sql_update_password) or die();

            header("location:index.php");

        } else {
            $error = "Confirmasi password harus sama dengan new password";
        }
    } else {
        $error = "Current Password Tidak Sesuai";
    }
}

include '../views/profile/v_change_password.php';

?>