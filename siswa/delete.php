<?php 
session_start();

include '../lib/library.php';
cekLogin();

include '../auth/authorization.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = @$_POST['id'];

    $id = $mysqli->escape_string($id);

    $sql_siswa = "SELECT siswa.*, media.* FROM siswa 
                LEFT JOIN media ON siswa.id = media.id_entity
                WHERE id = '$id'";
    $query_siswa = $mysqli->query($sql_siswa) or die($mysqli->error);
    $data_siswa = $query_siswa->fetch_assoc();

    if ($query_siswa->num_rows != 0){
        //Delete foto dan data foto pada table media
        $target_file = "../assets/image/". $data_siswa["nama_media"];
        unlink($target_file);

        $sql_hapus_siswa        = "DELETE FROM siswa WHERE id = '$id'";
        $sql_hapus_akun_siswa   = "DELETE FROM akun WHERE id_entity = '$id'";
        $sql_hapus_media_siswa  = "DELETE FROM media WHERE id_entity = '$id'";

        $sql_hapus_pelanggaran  = "DELETE FROM pelanggaran WHERE id_siswa = '$id'";
        $sql_hapus_penghargaan  = "DELETE FROM penghargaan WHERE id_siswa = '$id'";

        $query_siswa            = $mysqli->query($sql_hapus_siswa) or die($mysqli->error);
        $query_akun_siswa       = $mysqli->query($sql_hapus_akun_siswa) or die($mysqli->error);
        $query_media_siswa      = $mysqli->query($sql_hapus_media_siswa) or die($mysqli->error);
        $query_pelanggaran      = $mysqli->query($sql_hapus_pelanggaran) or die($mysqli->error);
        $query_penghargaan      = $mysqli->query($sql_hapus_penghargaan) or die($mysqli->error);

        header("location:index.php");
    } else {
        header("location:index.php");
    }
}

?>