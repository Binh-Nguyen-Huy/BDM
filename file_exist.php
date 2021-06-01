<style>
    .warning {
        position: fixed;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        background-color: maroon;
    }

    h2 {
        margin-top: 25%;
        text-align: center;
    }
</style>

<?php 
    $install_file = "install.php";

    if (file_exists($install_file)) {
        echo "<div class='warning'><h2>Please delete file instal.php to continue!</h2></div>";
        exit();
    }
?>
  