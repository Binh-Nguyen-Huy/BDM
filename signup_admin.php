<?php

    $admin_name = $_POST["admin_name"];
    $password = $_POST["password"];
    $confirm_password = $_POST["repeat_pwd"];

    if (empty($admin_name) || empty($password) || empty($confirm_password)) {
        header("location:install.php?login=empty");
        echo "<h2>Please fill out the form</h2>"; 
        exit();
    }

    else if ($confirm_password !== $password) {
        header("location:install.php?login=password_not_match");
        exit();
    }

    else {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $data = fopen("data_admin.txt", "w+");

        fwrite($data, $admin_name."\n");
        fwrite($data, $password);

        fclose($data);

        header("location:admin_login.php");
    }
    