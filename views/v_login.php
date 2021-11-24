<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | My Point</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/bootstrap.min.css">
    
</head>

<body>
    <form class="form-horizontal" action="login.php" method="POST">
        <div class="login-box">
            <img src="../assets/image/avatar.jpg" class="avatar">
            <h1>Login Here</h1>
            <form action="login.php" method="post">
                <p>Email</p>
                <input type="text" name="email" placeholder="Enter Email">
                <p>Password</p>
                <input type="Password" name="password" placeholder="Enter Password">
                <p>Masuk Sebagai</p>
                <select class="mb-3 form-select" name="id_hak_akses" id="id_hak_akses">
                    <?php while ($item = $query_hak_akses->fetch_assoc()){?>
                        <option value="<?php echo $item['id_hak_akses']?>"><?php echo $item['nama_hak_akses']?></option>    
                    <?php }?>
                </select>
                <input type="submit" name="submit" value="Login">
            </form>
        </div>
    </form>

    <script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>
</body>

</html>