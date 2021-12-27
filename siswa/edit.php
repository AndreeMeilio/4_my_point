<?php 

include '../lib/library.php';
cekLogin();

include '../auth/authorization.php';

$id = @$_GET['nis'];

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $nis            = @$_POST['nis'];
    $email          = @$_POST['email'];
    $id_kelas       = @$_POST['id_kelas'];
    $nama           = @$_POST['nama'];
    $tempat_lahir   = @$_POST['tempat_lahir'];
    $tanggal_lahir  = @$_POST['tanggal_lahir'];
    $jenis_kelamin  = @$_POST['jenis_kelamin'];
    $agama          = @$_POST['agama'];
    $no_telepon          = @$_POST['no_telepon'];
    $id_provinsi    = '-';
    $id_kabupaten   = '-';
    $id_kecamatan   = '-';
    $id_kelurahan   = '-';
    $alamat         = @$_POST['alamat'];


    // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
    $nis            = $mysqli->escape_string($nis);
    $email          = $mysqli->escape_string($email);
    $id_kelas       = $mysqli->escape_string($id_kelas);
    $nama           = strtoupper($mysqli->escape_string($nama));
    $tempat_lahir   = $mysqli->escape_string($tempat_lahir);
    $tanggal_lahir  = $mysqli->escape_string($tanggal_lahir);
    $jenis_kelamin  = $mysqli->escape_string($jenis_kelamin);
    $agama          = $mysqli->escape_string($agama);
    $no_telepon          = $mysqli->escape_string($no_telepon);
    // $id_provinsi    = $mysqli->escape_string($id_provinsi);
    // $id_kabupaten   = $mysqli->escape_string($id_kabupaten);
    // $id_kecamatan   = $mysqli->escape_string($id_kecamatan);
    // $id_kelurahan   = $mysqli->escape_string($id_kelurahan);
    $alamat = $mysqli->escape_string($alamat);
    $datetime       = date('Y-m-d H:i:s');
    $password       = password_hash($nis, PASSWORD_DEFAULT);

    $sql_update_siswa = "UPDATE siswa SET 
        id        = '$nis',
        id_kelas        = '$id_kelas',
        nama            = '$nama',
        tempat_lahir    = '$tempat_lahir',
        tanggal_lahir   = '$tanggal_lahir',
        jenis_kelamin   = '$jenis_kelamin',
        agama           = '$agama',
        no_telepon      = '$no_telepon',
        alamat          = '$alamat',
        date_update     = '$datetime'
        WHERE id  = '$id'
    ";

    $query_update_siswa = $mysqli->query($sql_update_siswa) or die($mysqli->error);

    $sql_update_akun_siswa = "UPDATE akun SET 
        id_entity   = '$nis',
        email       = '$email',
        password    = '$password'
        WHERE id_entity = '$id'
    ";

    $query_update_akun_siswa = $mysqli->query($sql_update_akun_siswa) or die($mysqli->error);

    if (isset($_FILES["foto"])){
        $target_dir = "../assets/image/";

        //Deleting Current File
        $sql_media = "SELECT * FROM media where id_entity = '". $id. "'";
        $query_media = $mysqli->query($sql_media) or die($mysqli->error);
        $data_media = $query_media->fetch_assoc();

        if ($data_media["nama_media"] !== null){
            $file_want_to_delete = $target_dir. $data_media["nama_media"];
            unlink($file_want_to_delete);
        }

        //Upload Foto
        
        $file_ext=strtolower(end(explode('.',$_FILES['foto']['name'])));
        $file_name = $id. date("Ymd"). ".". $file_ext;
        $target_file = $target_dir. $file_name;
        $file_tmp = $_FILES["foto"]["tmp_name"];
        $file_size = $_FILES["foto"]["size"];

        $extensions= array("jpeg","jpg","png");

        if (in_array($file_ext, $extensions) === true && $file_size < 2097152){
            $upload = move_uploaded_file($file_tmp, $target_file);

            if ($upload){
                $id_media = uniqid("md");
                $id_entity_penambah = $_SESSION['id_entity'];

                $sql_delete_media = "DELETE FROM media where id_entity = '". $id_entity. "'";
                $sql_upload_media = "INSERT INTO media VALUES(
                    '". $id_media ."', '". $id . "', '". $id_entity_penambah ."', '". $file_name ."', '". $datetime ."', '". $datetime ."'
                )";

                $query_delete_media = $mysqli->query($sql_delete_media) or die($mysqli->error);
                $query_insert_media = $mysqli->query($sql_upload_media) or die($mysqli->error);
            } else {
                echo "gagal upload file";
                die();
            }

        } else {
            echo "format foto harus jpeg, jpg, atau png dan ukurannya harus dibawah 2 mb";
            die();
        }

    }

    header("location:index.php");

} else {
    $sql = "SELECT siswa.*, akun.*, media.id_media, media.nama_media FROM siswa
            LEFT JOIN akun ON siswa.id = akun.id_entity
            LEFT JOIN media ON siswa.id = media.id_entity
            WHERE siswa.id = '$id'";

    $query      = $mysqli->query($sql) or die($mysqli->error);

    $data_siswa = $query->fetch_assoc();

    $sql_kelas  = "SELECT * FROM kelas";
    $data_kelas      = $mysqli->query($sql_kelas) or die($mysqli->error);

    include '../views/siswa/v_tambah_edit.php';
}

?>
