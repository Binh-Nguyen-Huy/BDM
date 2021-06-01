<?php include_once "file_exist.php" ?>

<?php
session_start();
require 'cate_browse_function.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style_1.css">
        <title>BDM Mall</title>
    </head>

    <header>
        <div class="nav">
            <a href="index.php">
                <img src="logo.webp" alt="logo" class="logo" />
            </a>
            <!-- Nav PC -->
            <nav class="nav__pc">
                <ul class="nav__list">
                    <li>
                        <a href="index.php" class="nav__link">HOME</a>
                    </li>
                    <li>
                        <a href="about_us.html" class="nav__link">ABOUT US</a>
                    </li>
                    <li>
                        <a href="fees.html" class="nav__link">FEES</a>
                    </li>
                    <li>
                        <a href="my_account_2.html" class="nav__link">MY ACCOUNT</a>
                    </li>
                    <li>
                        <input type="checkbox" name="" class="nav__drop" id="nav__dropdown">
                        <label for="nav__dropdown" class="nav__drop-btn">
                            <a>BROWSE</a>
                        </label>
                        <div class="nav__drop-content">
                            <a href="browse-by-name.php">Browse Stores by Name</a>
                            <a href="browse-by-category.php">Browse Stores by Category</a>
                        </div>
                    </li>
                    <li>
                        <a href="FAQs.html" class="nav__link">FAQs</a>
                    </li>
                    <li>
                        <a href="contact.html" class="nav__link">CONTACT</a>
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
                        <a href="index.php" class="nav__responsive-link">HOME</a>
                    </li>
                    <li>
                        <a href="about_us.html" class="nav__responsive-link">ABOUT US</a>
                    </li>
                    <li>
                        <a href="fees.html" class="nav__responsive-link">FEES</a>
                    </li>
                    <li>
                        <a href="my_account_2.html" class="nav__responsive-link">MY ACCOUNT</a>
                    </li>
                    <li>
                        <a href="browse-by-name.php" class="nav__responsive-link">Browse Stores by Name</a>
                    </li>
                    <li>
                        <a href="browse-by-category.php" class="nav__responsive-link">Browse Stores by Category</a>
                    </li>
                    <li>
                        <a href="FAQs.html" class="nav__responsive-link">FAQs</a>
                    </li>
                    <li>
                        <a href="contact.html" class="nav__responsive-link">CONTACT</a>
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
            <h1>Browse Stores</h1>
            <h2>By Categories</h2>
            <div class="row">
                <div class="col p-12 t-12 m-12">
                    <div class="select_form">
                        <?php

                            $test_search = [
                                ['cate' => '1', 'type' => 'Department stores'],
                                ['cate' => '2', 'type' => 'Grocery stores'],
                                ['cate' => '3', 'type' => 'Restaurants'],
                                ['cate' => '4', 'type' => 'Clothing stores'],
                                ['cate' => '5', 'type' => 'Accessory stores'],
                                ['cate' => '6', 'type' => 'Pharmacies'],
                                ['cate' => '7', 'type' => 'Technology stores'],
                                ['cate' => '8', 'type' => 'Pet stores'],
                                ['cate' => '9', 'type' => 'Toy stores'],
                                ['cate' => '10', 'type' => 'Specialty stores'],
                                ['cate' => '11', 'type' => 'Thrift stores'],
                                ['cate' => '12', 'type' => 'Services'],
                                ['cate' => '13', 'type' => 'Kiosks']
                            ];
                        ?>
                            <select name="name" id="option_form" onchange="location = this.value">
                                <option value="" disabled selected>Select One Category</option>
                                <?php
                                        
                                        foreach($test_search as $t)
                                        {
                                            $cate = $t['cate'];
                                            $type = $t['type'];
                                            echo "<option value='cate_browse.php?cate=$cate&type=$type'>$type</option>";
                                        }
                                        

                                ?>
                             </select>


                            
                    </div>
                </div>
            </div>
        </div>

        <div class="cookies-container" id="mall">
            
            <h1>I use cookies</h1>
                
            <p>My website uses cookies necessary for its basic functioning. By continuing browsing, you consent to my use of cookies and other technologies</p>

            <div class="row">
                <div class="col p-2 t-12 m-12">
                    <button class="btn-cookies" id="mall">
                        I understand
                    </button>
                </div>

                <div class="col p-2 t-12 m-12">
                    <a href="">Learn More</a>
                </div>
            </div>
          </div>

        <script src="javascript/cookies.js"></script>
    </body>

    <footer class="footer__distributed">
        <div class="footer__left">
            <img src="logo.webp" class="footer__logo">
            <p class="footer__links">
                <a href="index.php">HOME</a>
                |
                <a href="about_us.php">ABOUT US</a>
                |
                <a href="fees.php">FEES</a>
                |
                <a href="my_account_2.html">MY ACCOUNT</a>
                |
                <a href="browse-by-name.php">Browse Stores by Name</a>
                |
                <a href="browse-by-category.php">Browse Stores by Category</a>
                |
                <a href="FAQs.html">FAQs</a>
                |
                <a href="contact.html">CONTACT</a>
            </p>
        </div>
        <div class="footer__right">
            <p class="footer__company-about">
                <span>About the company</span>
                We specialize in providing fashion products with high-end brands of more than 500 famous brands globally, including fashion products, bags, watches, perfumes, eyewear, sneakers, beauty cosmetics, etc.</p>
            <div class="footer__icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>
            </div>
            <p class="footer__links">
                <a href="tos.php">Term of Service</a>
                |
                <a href="privacy.php">Privacy Policy</a>
                |
                <a href="copyright.php">Copyright</a>
            </p>
            <p class="footer__company-name">© 2021 BDM Team.</p>
        </div>
    </footer>
</html>