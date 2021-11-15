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
                <input type="text" name="username" class="form-control">
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
                <select name="role" id="role">
                    <option value="admin">Admin</option>
                    <option value="user" selected>User</option>
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