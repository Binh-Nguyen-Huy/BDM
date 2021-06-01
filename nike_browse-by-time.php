<?php include_once "file_exist.php" ?>

<?php
session_start();
require 'nike_browse_function.php';

$products = read_all_products();

$test_search = [
    ['name' => 'NEWEST FIRST'],
    ['name' => 'OLDEST FIRST'],
];

$id = $_GET['id'];

$some_product = lastest($id);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initiap-scale=1.0">
        <script src="https://kit.fontawesome.com/caea2bcb89.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style-store-1.css">
        <title>Nike Store</title>
    </head>

    <header>
        <div class="nav">
        <a href="store.php?id=<?php echo $_GET['id'];?>">
                <img src="./Nike Store Page/nike-logo.webp" alt="logo" class="logo" />
            </a>
            </a>
            <!-- Nav PC -->
            <nav class="nav__pc">
            <ul class="nav__list">
                    <li>
                        <a href="store.php?id=<?php echo $_GET['id'];?>" class="nav__link">HOME</a>
                    </li>
                    <li>
                        <a href="nike_about-us.html" class="nav__link">ABOUT US</a>
                    </li>
                    <li>
                        <input type="checkbox" name="" class="nav__drop" id="nav__dropdown">
                        <label for="nav__dropdown" class="nav__drop-btn">
                            <a>PRODUCTS</a>
                        </label>
                        <div class="nav__drop-content">
                            <a href="nike_browse-by-category.html">Browse Products by Category</a>
                            <?php
                                echo "<a href=\"?id=$id\">Browse Products by Created Time</a>";
                            ?>
                        </div>
                    </li>
                    <li>
                        <a href="nike_contact.html" class="nav__link">CONTACT</a>
                    </li>
                </ul>
            </nav>
            <!-- Nav Responsive -->
            <label for="nav__responsive-input" class="nav__responsive-bars-btn">
                <i class="fa fa-bars"></i>
            </label>
    
            <input type="checkbox" name="" class="nav__input" id="nav__responsive-input">
    
            <label for="nav__responsive-input" class="nav__overlay"></label>
    
            <nav class="nav__responsive">
                <ul class="nav__responsive-list">
                    <li>
                    <a href="store.php?id=<?php echo $_GET['id'];?>" class="nav__responsive-link">HOME</a>
                    </li>
                    <li>
                        <a href="nike_about-us.html" class="nav__responsive-link">ABOUT US</a>
                    </li>
                    <li>
                        <a href="nike_browse-by-category.html" class="nav__responsive-link">Browse Products by Category</a>
                    </li>
                    <li>
                    <?php
                            echo "<a href=\"?id=$id\" class='nav_responsive-link'>Browse Products by Created Time</a>";
                        ?>
                    </li>
                    <li>
                        <a href="nike_contact.html" class="nav__responsive-link">CONTACT</a>
                    </li>
                </ul>
                <label for="nav__responsive-input" class="nav__responsive-close">
                    <i class="fa fa-times"></i>
                </label>
            </nav>
        </div>
    </header>

    <body>
        <div class="grid">
            <h1>Product's Date</h1>
            <div class="col p-12 t-12 m-12 drop-down">
                <select onchange="location = this.value ">
                <option value="" disabled selected>Select One Category</option>
                <?php
                    $page = 1;
                
                    foreach($test_search as $t)
                    {
                        $name = $t['name'];
                        echo "<option value='nike_browse.php?name=$name&page=$page&id=$id'>$name</option>";
                    }
                ?>
                </select>
            </div>
            <hr>

        </div>

        <div class="grid">
            <div class="row">
                <?php

                    $new_product = [];
                    for($index = 0; $index < count($some_product); $index++)
                    {
                        $new_product[$index][0] = $some_product[$index]['name'];
                        $new_product[$index][1] = $some_product[$index]['price'];
                        $new_product[$index][2] = $some_product[$index]['created_time'];
                        array_push($new_product[$index], '<img src="img/bape.webp" alt="">');
                        array_push($new_product[$index], 'High-quality, For eveyone');

                    }
                    
                    $new_id = [];
                    for($index = 0; $index < count($some_product); $index++)
                    {
                        $new_id[$index] = $some_product[$index]['id'];

                    }


                    for($i = 0; $i < count($some_product); $i++)
                    {
                        echo "<div class='col p-3 t-12 m-12'><div class='product'><a href=\"product-detail.php?id=$new_id[$i]\">";
                                echo "<h3>".$new_product[$i][3]. "</h3><br>";
                                echo "<pre>";
                                echo "<h3>".$new_product[$i][0]. "</h3><br>";
                                echo "<pre>";
                                echo "<p>price: " .$new_product[$i][1]. "</p>";
                                echo "<pre>";
                                echo "<p>created time: " .$new_product[$i][2]. "</p>";
                                echo "<pre>";
                                echo "<p>description: " .$new_product[$i][4]. "</p><br>";
                                echo "</a></div></div>";
                    }
                ?>
            </div>
        </div>

        <div class="cookies-container" id="nike_page">
            
            <h1>I use cookies</h1>
                
            <p>My website uses cookies necessary for its basic functioning. By continuing browsing, you consent to my use of cookies and other technologies</p>

            <div class="row">
                <div class="col p-2 t-12 m-12">
                    <button class="btn-cookies" id="nike_page">
                        I understand
                    </button>
                </div>

                <div class="col p-2 t-12 m-12">
                    <a href="">Learn More</a>
                </div>
            </div>
          </div>

          <script src="nike-store.js"></script>
    </body>

    <footer class="footer__distributed">
        <div class="footer__left">
            <img src="nike-logo.webp" class="footer__logo">
            <p class="footer__links">
            <a href="store.php?id=<?php echo $_GET['id'];?>" class="nav__link">HOME</a>
                |
                <a href="nike_about-us.html">ABOUT US</a>
                |
                <a href="nike_browse-by-category.html">Browse Products by Category</a>
                |
                <?php
                     echo "<a href=\"?id=$id\">Browse Products by Created Time</a>";
                ?>
                |
                <a href="nike_contact.html">CONTACT</a>
            </p>
        </div>
        <div class="footer__right">
            <p class="footer__company-about">
                <span>About <?php echo $storeInformation['name'];?></span>
                Our mission is what drives us to do everything possible to expand human potential. We do that by creating groundbreaking sport innovations, by making our products more sustainably, by building a creative and diverse global team and by making a positive impact in communities where we live and work. Based in Beaverton, Oregon, <?php echo $storeInformation['name'];?>, Inc. includes the <?php echo $storeInformation['name'];?>, Converse, and Jordan brands.</p>            <div class="footer__icons">
                <a href="https://www.facebook.com/nike"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/nike/"><i class="fa fa-instagram"></i></a>
                <a href="https://twitter.com/nike"><i class="fa fa-twitter"></i></a>
            </div>
            <p class="footer__links">
                <a href="nike_ToS.html">Term of Service</a>
                |
                <a href="nike_privacy.html">Privacy Policy</a>
                |
                <a href="nike_copyright.html">Copyright</a>
            </p>
            <p class="footer__company-name">© 2021 BDM Team.</p>
        </div>
    </footer>
</html>