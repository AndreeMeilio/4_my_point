<?php

include '../lib/library.php';
cekLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_kelas = @$_POST['id_kelas'];
    $semester = @$_POST['semester'];
    $tahun = @$_POST['tahun'];

    $id_kelas = $mysqli->escape_string($id_kelas);
    $semester = $mysqli->escape_string($semester);
    $tahun = $mysqli->escape_string($tahun);

    $awal_tanggal = "";
    $akhir_tanggal = "";

    if ($semester == "ganjil") {
        $awal_tanggal = $tahun . "-01-01";
        $akhir_tanggal = $tahun . "-06-01";
    } else if ($semester == "genap") {
        $awal_tanggal = $tahun . "-07-01";
        $akhir_tanggal = $tahun . "-12-01";
    }

    $sql_kelas = "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'";
    $query_kelas = $mysqli->query($sql_kelas);
    $data_kelas = $query_kelas->fetch_assoc();

    $sql_siswa = "SELECT * FROM siswa WHERE id_kelas = '$id_kelas'";
    $query_siswa = $mysqli->query($sql_siswa) or die($mysqli->error);

    $siswa = array();

    while ($item = $query_siswa->fetch_assoc()) {
        $siswa[] = $item;
    }

    $sql_pelanggaran = "SELECT pelanggaran.*, jenis_pelanggaran.* ,siswa.* FROM pelanggaran LEFT JOIN jenis_pelanggaran ON pelanggaran.id_jenis_pelanggaran = jenis_pelanggaran.id_jenis_pelanggaran LEFT JOIN siswa ON pelanggaran.id_siswa = siswa.id WHERE siswa.id_kelas = '$id_kelas' AND pelanggaran.tgl_pelanggaran BETWEEN '$awal_tanggal' AND '$akhir_tanggal'; ";
    $query_pelanggaran = $mysqli->query($sql_pelanggaran) or die($mysqli->error);

    $pelanggaran = array();

    while ($item = $query_pelanggaran->fetch_assoc()) {
        $pelanggaran[] = $item;
    }

    $hasil = array();


    foreach ($siswa as $item_siswa) {
        $hasil_sementara = array();
        $hasil_sementara["detail_pelanggaran"] = array();

        $hasil_sementara["nis"] = $item_siswa["id"];
        $hasil_sementara["nama"] = $item_siswa["nama"];
        $hasil_sementara["poin"] = $item_siswa["poin"];

        foreach ($pelanggaran as $item_pelanggaran) {
            $hasil_sementara_pelanggaran = array();

            if ($item_pelanggaran["id_siswa"] == $item_siswa["id"]) {
                $hasil_sementara_pelanggaran["tgl_pelanggaran"] = $item_pelanggaran["tgl_pelanggaran"];
                $hasil_sementara_pelanggaran["desc_pelanggaran"] = $item_pelanggaran["desc_pelanggaran"];
                $hasil_sementara_pelanggaran["poin_pengurangan"] = $item_pelanggaran["poin_pengurangan"];

                array_push($hasil_sementara["detail_pelanggaran"], $hasil_sementara_pelanggaran);
            }
        }
        array_push($hasil, $hasil_sementara);
    }

    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=laporan_pelanggaran.xls");
    include '../views/laporan/v_template_download.php';
} else {
    $sql_kelas = "SELECT * FROM kelas";
    $query_kelas = $mysqli->query($sql_kelas) or die($mysqli->error);

    include '../views/laporan/v_index.php';
}
