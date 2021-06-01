
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_1.css">
    <title>Admin Login</title>
</head>
<body>

<div class="grid account">
        <div class="row">
            <div class="col p-12 t-12 m-12">
                <h1>Admin Account</h1>
                <h2>Please login account for admin</h2>
            </div>  
        </div>
        <form action="admin_login.php" method="post" class="form">
        <div class="account_container">
            <input type="text" name="admin_name" placeholder="username"><br>
            <input type="password" name="password" placeholder="password"><hr>
            <div class="account_container">
                <button type="submit" name="submit" class="account_btn" id="create">Log in</button>
            </div>
        </div>
            <?php
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($url, "login=invalid_username") == true) {
                    echo "<pre><br>";
                    echo "<h2 class='error'>Invalid username</h2>";
                    exit();
                }
                
                if (strpos($url, "login=invalid_password") == true) {
                    echo "<pre><br>";
                    echo "<h2 class='error'>Invalid password</h2>";
                    exit();
                }
            ?>
        </form>
    </div>
    
</body>
</html>

<?php

$content = file_get_contents("data_admin.txt");
$data = explode("\n", $content);
$data_adminname = $data[0];
$data_password = $data[1];
$admin_name = $_POST["admin_name"];
$password = $_POST["password"];

if ($admin_name !== $data_adminname) {
    header("location:admin_login.php?login=invalid_username");
    exit();
}
else if ($password !== $data_password) {
    header("location:admin_login.php?login=invalid_password");
    exit();
}
else {
    header("location:dashboard.php");
    exit();
}
