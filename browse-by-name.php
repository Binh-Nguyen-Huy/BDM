<?php include_once "file_exist.php" ?>

<?php
session_start();
require 'browse_function.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
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
            <h2>By Name</h2>
            <div class="row">

                <?php
                    $store = read_all_products();
                    $test_search = [
                        ['name' => 'A', 'type' => '<img src="alphabet-img/A.webp" alt="store" class="store-logo">'],
                        ['name' => 'B', 'type' => '<img src="alphabet-img/B.webp" alt="store" class="store-logo">'],
                        ['name' => 'C', 'type' => '<img src="alphabet-img/C.webp" alt="store" class="store-logo">'],
                        ['name' => 'D', 'type' => '<img src="alphabet-img/D.webp" alt="store" class="store-logo">'],
                        ['name' => 'E', 'type' => '<img src="alphabet-img/E.webp" alt="store" class="store-logo">'],
                        ['name' => 'F', 'type' => '<img src="alphabet-img/F.webp" alt="store" class="store-logo">'],
                        ['name' => 'G', 'type' => '<img src="alphabet-img/G.webp" alt="store" class="store-logo">'],
                        ['name' => 'H', 'type' => '<img src="alphabet-img/H.webp" alt="store" class="store-logo">'],
                        ['name' => 'I', 'type' => '<img src="alphabet-img/I.webp" alt="store" class="store-logo">'],
                        ['name' => 'J', 'type' => '<img src="alphabet-img/J.webp" alt="store" class="store-logo">'],
                        ['name' => 'K', 'type' => '<img src="alphabet-img/K.webp" alt="store" class="store-logo">'],
                        ['name' => 'L', 'type' => '<img src="alphabet-img/L.webp" alt="store" class="store-logo">'],
                        ['name' => 'M', 'type' => '<img src="alphabet-img/M.webp" alt="store" class="store-logo">'],
                        ['name' => 'N', 'type' => '<img src="alphabet-img/N.webp" alt="store" class="store-logo">'],
                        ['name' => 'O', 'type' => '<img src="alphabet-img/O.webp" alt="store" class="store-logo">'],
                        ['name' => 'P', 'type' => '<img src="alphabet-img/P.webp" alt="store" class="store-logo">'],
                        ['name' => 'Q', 'type' => '<img src="alphabet-img/Q.webp" alt="store" class="store-logo">'],
                        ['name' => 'R', 'type' => '<img src="alphabet-img/R.webp" alt="store" class="store-logo">'],
                        ['name' => 'S', 'type' => '<img src="alphabet-img/S.webp" alt="store" class="store-logo">'],
                        ['name' => 'T', 'type' => '<img src="alphabet-img/T.webp" alt="store" class="store-logo">'],
                        ['name' => 'U', 'type' => '<img src="alphabet-img/U.webp" alt="store" class="store-logo">'],
                        ['name' => 'V', 'type' => '<img src="alphabet-img/V.webp" alt="store" class="store-logo">'],
                        ['name' => 'W', 'type' => '<img src="alphabet-img/W.webp" alt="store" class="store-logo">'],
                        ['name' => 'X', 'type' => '<img src="alphabet-img/X.webp" alt="store" class="store-logo">'],
                        ['name' => 'Y', 'type' => '<img src="alphabet-img/Y.webp" alt="store" class="store-logo">'],
                        ['name' => 'Z', 'type' => '<img src="alphabet-img/Z.webp" alt="store" class="store-logo">'],
                        ['name' => '0', 'type' => '<img src="alphabet-img/0.webp" alt="store" class="store-logo">'],
                        ['name' => '1', 'type' => '<img src="alphabet-img/1.webp" alt="store" class="store-logo">'],
                        ['name' => '2', 'type' => '<img src="alphabet-img/2.webp" alt="store" class="store-logo">'],
                        ['name' => '3', 'type' => '<img src="alphabet-img/3.webp" alt="store" class="store-logo">'],
                        ['name' => '4', 'type' => '<img src="alphabet-img/4.webp" alt="store" class="store-logo">'],
                        ['name' => '5', 'type' => '<img src="alphabet-img/5.webp" alt="store" class="store-logo">'],
                        ['name' => '6', 'type' => '<img src="alphabet-img/6.webp" alt="store" class="store-logo">'],
                        ['name' => '7', 'type' => '<img src="alphabet-img/7.webp" alt="store" class="store-logo">'],
                        ['name' => '8', 'type' => '<img src="alphabet-img/8.webp" alt="store" class="store-logo">'],
                        ['name' => '9', 'type' => '<img src="alphabet-img/9.webp" alt="store" class="store-logo">']
                    ];

                    foreach($test_search as $t){
                        $name = $t['name'];
                        $type = $t['type'];
                        echo nl2br("<div class='col p-1 t-3 m-6'><a href=\"browse.php?name=$name\">$type</a></div>" );
                    }
                ?>
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
                <a href="about_us.html">ABOUT US</a>
                |
                <a href="fees.html">FEES</a>
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