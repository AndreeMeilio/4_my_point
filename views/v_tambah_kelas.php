<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tambah Kelas</h1>
    <form action="tambah_kelas.php" method="post">
        <label for="tingkatan">Tingkatan:</label><br>
        <select name="tingkatan" id="tingkatan">
            <option value="" disabled selected>Pilih Tingkatan</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
            <option value="XIII">XIII</option>
        </select><br>
        <label for="nama_kelas">Nama Kelas:</label><br>
        <input type="text" name="nama_kelas" id="nama_kelas"><br>
        <label for="awal_tahun_ajaran">Awal Tahun Ajaran:</label><br>
        <input type="number" id="awal_tahun_ajaran" name="awal_tahun_ajaran" min="1900" max="2099" step="1"><br>
        <label for="akhir_tahun_ajaran">Akhir Tahun Ajaran:</label><br>
        <input type="number" id="akhir_tahun_ajaran" name="akhir_tahun_ajaran" min="1900" max="2099" step="1"><br>
        <button type="submit">Tambah</button>
    </form>
</body>

</html>