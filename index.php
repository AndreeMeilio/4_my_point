<?php
    include 'lib/library.php';

    cekLogin();

    $sql_jumlah_tata_tertib = "SELECT COUNT('id_jenis_pelanggaran') as jumlah_tata_tertib FROM jenis_pelanggaran";
    $query_jumlah_tata_tertib = $mysqli->query($sql_jumlah_tata_tertib) or die($mysqli->error);
    $jumlah_tata_tertib = $query_jumlah_tata_tertib->fetch_assoc()['jumlah_tata_tertib'];

    $sql_pelanggaran = "SELECT COUNT('id_pelanggaran') as jumlah_pelanggaran FROM pelanggaran";
    $query_pelanggaran = $mysqli->query($sql_pelanggaran) or die($mysqli->error);
    $pelanggaran = $query_pelanggaran->fetch_assoc()['jumlah_pelanggaran'];

    $sql_penghargaan = "SELECT COUNT('id_penghargaan') as jumlah_penghargaan FROM penghargaan";
    $query_penghargaan = $mysqli->query($sql_penghargaan) or die($mysqli->error);
    $penghargaan = $query_penghargaan->fetch_assoc()['jumlah_penghargaan'];

    //Pelanggaran Ringan
    $sql_ringan = "SELECT COUNT('id_pelanggaran') as jumlah_ringan FROM pelanggaran WHERE kategori_pelanggaran = 'ringan'";
    $query_ringan = $mysqli->query($sql_ringan) or die($mysqli->error);
    $ringan = $query_ringan->fetch_assoc()['jumlah_ringan'];
    //Pelanggaran Sedang
    $sql_sedang = "SELECT COUNT('id_pelanggaran') as jumlah_sedang FROM pelanggaran WHERE kategori_pelanggaran = 'sedang'";
    $query_sedang = $mysqli->query($sql_sedang) or die($mysqli->error);
    $sedang = $query_sedang->fetch_assoc()['jumlah_sedang'];

    //Penghargaan Kota
    $sql_kota = "SELECT COUNT('id_penghargaan') as jumlah_kota FROM penghargaan WHERE tingkat = 'kota'";
    $query_kota = $mysqli->query($sql_kota) or die($mysqli->error);
    $kota = $query_kota->fetch_assoc()['jumlah_kota'];

    $sql_provinsi = "SELECT COUNT('id_penghargaan') as jumlah_provinsi FROM penghargaan WHERE tingkat = 'provinsi'";
    $query_provinsi = $mysqli->query($sql_provinsi) or die($mysqli->error);
    $provinsi = $query_provinsi->fetch_assoc()['jumlah_provinsi'];

    $sql_nasional = "SELECT COUNT('id_penghargaan') as jumlah_nasional FROM penghargaan WHERE tingkat = 'nasional'";
    $query_nasional = $mysqli->query($sql_nasional) or die($mysqli->error);
    $nasional = $query_nasional->fetch_assoc()['jumlah_nasional'];

    $sql_international = "SELECT COUNT('id_penghargaan') as jumlah_international FROM penghargaan WHERE tingkat = 'international'";
    $query_international = $mysqli->query($sql_international) or die($mysqli->error);
    $international = $query_international->fetch_assoc()['jumlah_international'];

    $sql_kelas = "select kelas.*, siswa.*, pelanggaran.*, penghargaan.*, COUNT(pelanggaran.id_pelanggaran) as total_pelanggaran, COUNT(penghargaan.id_penghargaan) as total_penghargaan
    FROM kelas
    LEFT JOIN siswa ON kelas.id_kelas = siswa.id_kelas
    LEFT JOIN pelanggaran ON siswa.id = pelanggaran.id_siswa
    LEFT JOIN penghargaan ON siswa.id = penghargaan.id_siswa
    GROUP BY kelas.id_kelas";

    $query_kelas = $mysqli->query($sql_kelas) or die($mysqli->error);
    
    include 'views/v_index.php';

    // if($_SESSION['nama_hak_akses'] == 'admin' || $_SESSION['nama_hak_akses'] == 'guru') {
    //     include 'views/v_index.php';
    // } 
    // elseif ($_SESSION['nama_hak_akses'] == 'siswa') {
        // include 'views/v_index_user.php';
    // }
?>