<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_1.css">
    <title>Install</title>
</head>

<body>
    <div class="grid account">
        <div class="row">
            <div class="col p-12 t-12 m-12">
                <h1>Admin Account</h1>
                <h2>Please create an account for admin</h2>
            </div>  
        </div>
        <form action="signup_admin.php" method="post" class="form">
        <div class="account_container">
            <input type="text" name="admin_name" placeholder="Admin Name"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="password" name="repeat_pwd" placeholder="Password Confirm"><hr>
            <div class="account_container">
                <button type="submit" class="account_btn" name="submit" id="create">Create Account</button>
            </div>
        </div>
            <?php
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($url, "login=empty") == true) {
                    echo "<pre><br>";
                    echo "<h2 class='error'>Please fill up! Your form is empty</h2>";
                    exit();
                }
                
                if (strpos($url, "login=password_not_match") == true) {
                    echo "<pre><br>";
                    echo "<h2 class='error'>Password NOT match!</h2>";
                    exit();
                }
            ?>
        </form>
    </div>
</body>
</html>