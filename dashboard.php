<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_1.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="grid">
        <div class="row">
            <div class="col p-12 m-12 t-12">
                <h1>DASHBOARD</h1>
                <h2>Edit Page Content</h2>
                <hr>
            </div>

        </div>

        <div class="row">
                <form action="dashboard.php" method="POST">
                            <h2>Copyright page</h2>
                            <textarea name="copyright" id="Text_Box" name="Text1" cols="40" rows="5" style="width: 100%;" placeholder="write copyright content here..."></textarea><br><br><br>
                            <h2>ToS page</h2>
                            <textarea name="tos" id="Text_Box" name="Text1" cols="40" rows="5" style="width: 100%;" placeholder="write tos content here..."></textarea><br><br><br>

                            <h2>Privacy page</h2>
                            <textarea name="privacy" id="Text_Box" name="Text1" cols="40" rows="5" style="width: 100%;" placeholder="write privacy content here..."></textarea><br><br><br>
        </div>
        <hr>
        <div class="row">
                            <h2>Change Members Profile Images</h2>
                            <div class="col p-12 m-12 t-12">
                                <img src="about-us-img/Binh.webp" alt="profile image" name>
                            </div>
                            <div class="col p-12 m-12 t-12">
                                <input type="file" name="binh_img" accept=".png, .jpg, .jpeg, .webp">
                            </div>
                            <div class="col p-12 m-12 t-12">
                                <h3>Full Name: Nguyen Huy Binh</h3>
                            </div>
                            <div class="col p-12 m-12 t-12">
                            <h3>ID: s3883631</h3><hr>
                            </div>

                            <div class="col p-12 m-12 t-12">
                                <img src="about-us-img/Dung.webp" alt="profile image" name>
                            </div>
                            <div class="col p-12 m-12 t-12">
                                <input type="file" name="dung_img" accept=".png, .jpg, .jpeg, .webp">
                            </div>
                            <div class="col p-12 m-12 t-12">
                                <h3>Full Name: Nguyen Tri Dung</h3>
                            </div>
                            <div class="col p-12 m-12 t-12">
                                <h3>ID: s3883630</h3><hr>
                            </div>

                            <div class="col p-12 m-12 t-12">
                                <img src="about-us-img/Minh.webp" alt="profile image" name>
                            </div>
                            <div class="col p-12 m-12 t-12">
                                <input type="file" name="minh_img" accept=".png, .jpg, .jpeg, .webp">
                            </div>
                            <div class="col p-12 m-12 t-12">
                                <h3>Full Name: Trinh Quang Minh</h3>
                            </div>
                            <div class="col p-12 m-12 t-12">
                                <h3>ID: s3848088</h3><br>
                            </div>

         </div>
        <div class="row">
                            <div class="account_container">
                                <button type="submit" class="account_btn"  name="save">Save Changes</button>
                            </div>
        </div>      
                            <?php 
                                if(isset($_POST['save'])) {

                                    $copyright = $_POST["copyright"];
                                    $copyright_data = fopen("copyright_data.txt", "w+");
                                    fwrite($copyright_data, $copyright);
                                    fclose($copyright_data); 

                                    $ToS = $_POST["tos"];
                                    $ToS_data = fopen("tos_data.txt", "w+");
                                    fwrite($ToS_data, $ToS);
                                    fclose($ToS_data);

                                    $privacy = $_POST["privacy"];
                                    $privacy_data = fopen("privacy_data.txt", "w+");
                                    fwrite($privacy_data, $privacy);
                                    fclose($privacy_data);
                                }
                            ?>


                            <?php
                            if (isset($_POST['save'])) {
                                $member_name = array('binh', 'dung', 'minh');
                                $mem_ava = [];
                                foreach ($member_name as $n) {
                                    $mem_ava = $n. "_img";
                                    if ($_FILES[$mem_ava]["error"] == UPLOAD_ERR_OK) {
                                        $new_location = './about-us-img/' . $n . '_img.jpg';
                                        move_uploaded_file($_FILES[$mem_ava]['tmp_name'], $new_location);
                                    }
                                }
                            }
                            ?>

                </form>
            </div>

</body>
</html>