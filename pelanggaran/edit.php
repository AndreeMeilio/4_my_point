<?php 

include '../lib/library.php';
cekLogin();
include '../auth/authorization.php';

$id_pelanggaran = @$_GET['id_pelanggaran'];

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $tgl_pelanggaran = @$_POST['tgl_pelanggaran'];
    $id = @$_POST['id'];
    // $kategori_pelanggaran = @$_POST['kategori_pelanggaran'];
    $id_jenis_pelanggaran   = @$_POST['id_jenis_pelanggaran'];
    $poin_pelanggaran   = @$_POST['poin_pelanggaran'];

    // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
    $tgl_pelanggaran = $mysqli->escape_string($tgl_pelanggaran);
    $id = $mysqli->escape_string($id);
    $id_jenis_pelanggaran = $mysqli->escape_string($id_jenis_pelanggaran);
    // $kategori_pelanggaran = $mysqli->escape_string($kategori_pelanggaran);
    $poin_pelanggaran = $mysqli->escape_string($poin_pelanggaran);
    $poin_pengurangan = $poin_pelanggaran;

    $sql_pelanggaran = "SELECT * FROM pelanggaran WHERE id_pelanggaran = '". $id_pelanggaran. "'";
    $query_pelanggaran = $mysqli->query($sql_pelanggaran) or die($mysqli->error);
    $data_pelanggaran = $query_pelanggaran->fetch_assoc();

    $sql_current_poin = "SELECT poin FROM siswa WHERE id = '". $data_pelanggaran["id_siswa"]. "'";
    $query_current_poin = $mysqli->query($sql_current_poin) or die($mysqli->error);
    $current_poin = $query_current_poin->fetch_assoc();

    $total_poin = ($current_poin['poin'] + $data_pelanggaran['poin_pengurangan']) - $poin_pengurangan;

    $sql_update_poin_siswa = "UPDATE siswa SET poin = ". $total_poin ." WHERE id = '". $data_pelanggaran["id_siswa"] ."';";

    $sql_update_pelanggaran = "UPDATE pelanggaran SET 
                                tgl_pelanggaran = '". $tgl_pelanggaran. "',
                                poin_pengurangan = '". $poin_pengurangan. "',
                                id_jenis_pelanggaran = '". $id_jenis_pelanggaran."'
                                WHERE id_pelanggaran = '". $id_pelanggaran. "'";
    
    $query_update_poin_siswa = $mysqli->query($sql_update_poin_siswa) or die($mysqli->error);
    $query_update_pelanggaran = $mysqli->query($sql_update_pelanggaran) or die($mysqli->error);

    header("location:index.php");

} else {

    $sql_siswa = "SELECT * FROM siswa";
    $data_siswa = $mysqli->query($sql_siswa) or die($mysqli->error);

    $sql_jenis_pelanggaran = "SELECT * FROM jenis_pelanggaran";
    $data_jenis_pelanggaran = $mysqli->query($sql_jenis_pelanggaran) or die($mysqli->error);

    $sql_pelanggaran = "SELECT * FROM pelanggaran WHERE id_pelanggaran = '". $id_pelanggaran. "'";
    $query_pelanggaran = $mysqli->query($sql_pelanggaran) or die($mysqli->error); 

    $data_pelanggaran = $query_pelanggaran->fetch_assoc();

    include '../views/pelanggaran/v_tambah_edit.php';
}
