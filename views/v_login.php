<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | My Point</title>
    <link rel="stylesheet" type="text/css" href="#">
</head>
<body>
    <form class="form-horizontal" action="login.php" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label>Login sebagai:</label>
            <div class="col-sm-10">
                <select name="id_hak_akses" id="id_hak_akses">
                    <option value="1" selected>Siswa</option>
                    <option value="2">Guru</option>
                    <option value="3">Admin</option>
                </select>
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </form>
</body>
</html>