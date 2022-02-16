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

    //Pelanggaran per bulan
    $sql_januari = "SELECT COUNT('id_pelanggaran') as januari FROM pelanggaran WHERE MONTH(tgl_pelanggaran) = '01'";
    $query_januari = $mysqli->query($sql_januari) or die($mysqli->error);
    $januari = $query_januari->fetch_assoc()['januari'];

    $sql_februari = "SELECT COUNT('id_pelanggaran') as februari FROM pelanggaran WHERE MONTH(tgl_pelanggaran) = '02'";
    $query_februari = $mysqli->query($sql_februari) or die($mysqli->error);
    $februari = $query_februari->fetch_assoc()['februari'];

    $sql_maret = "SELECT COUNT('id_pelanggaran') as maret FROM pelanggaran WHERE MONTH(tgl_pelanggaran) = '03'";
    $query_maret = $mysqli->query($sql_maret) or die($mysqli->error);
    $maret = $query_maret->fetch_assoc()['maret'];

    $sql_april = "SELECT COUNT('id_pelanggaran') as april FROM pelanggaran WHERE MONTH(tgl_pelanggaran) = '04'";
    $query_april = $mysqli->query($sql_april) or die($mysqli->error);
    $april = $query_april->fetch_assoc()['april'];

    $sql_mei = "SELECT COUNT('id_pelanggaran') as mei FROM pelanggaran WHERE MONTH(tgl_pelanggaran) = '05'";
    $query_mei = $mysqli->query($sql_mei) or die($mysqli->error);
    $mei = $query_mei->fetch_assoc()['mei'];

    $sql_juni = "SELECT COUNT('id_pelanggaran') as juni FROM pelanggaran WHERE MONTH(tgl_pelanggaran) = '06'";
    $query_juni = $mysqli->query($sql_juni) or die($mysqli->error);
    $juni = $query_juni->fetch_assoc()['juni'];

    $sql_juli = "SELECT COUNT('id_pelanggaran') as juli FROM pelanggaran WHERE MONTH(tgl_pelanggaran) = '07'";
    $query_juli = $mysqli->query($sql_juli) or die($mysqli->error);
    $juli = $query_juli->fetch_assoc()['juli'];

    $sql_agustus = "SELECT COUNT('id_pelanggaran') as agustus FROM pelanggaran WHERE MONTH(tgl_pelanggaran) = '08'";
    $query_agustus = $mysqli->query($sql_agustus) or die($mysqli->error);
    $agustus = $query_agustus->fetch_assoc()['agustus'];

    $sql_september = "SELECT COUNT('id_pelanggaran') as september FROM pelanggaran WHERE MONTH(tgl_pelanggaran) = '09'";
    $query_september = $mysqli->query($sql_september) or die($mysqli->error);
    $september = $query_september->fetch_assoc()['september'];

    $sql_oktober = "SELECT COUNT('id_pelanggaran') as oktober FROM pelanggaran WHERE MONTH(tgl_pelanggaran) = '10'";
    $query_oktober = $mysqli->query($sql_oktober) or die($mysqli->error);
    $oktober = $query_oktober->fetch_assoc()['oktober'];

    $sql_november = "SELECT COUNT('id_pelanggaran') as november FROM pelanggaran WHERE MONTH(tgl_pelanggaran) = '11'";
    $query_november = $mysqli->query($sql_november) or die($mysqli->error);
    $november = $query_november->fetch_assoc()['november'];

    $sql_desember = "SELECT COUNT('id_pelanggaran') as desember FROM pelanggaran WHERE MONTH(tgl_pelanggaran) = '12'";
    $query_desember = $mysqli->query($sql_desember) or die($mysqli->error);
    $desember = $query_desember->fetch_assoc()['desember'];
    //Pelanggaran Sedang
    // $sql_sedang = "SELECT COUNT('id_pelanggaran') as jumlah_sedang FROM pelanggaran WHERE kategori_pelanggaran = 'sedang'";
    // $query_sedang = $mysqli->query($sql_sedang) or die($mysqli->error);
    // $sedang = $query_sedang->fetch_assoc()['jumlah_sedang'];

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