<?php include_once "file_exist.php" ?>

<?php
include("global_func.php");
$products = new CSVHandler('data/products.csv');
$stores = new CSVHandler('data/stores.csv');
$productId = $_GET['id'] ?? 0;
$filter = [
	['id', $productId]
];
$getFirstRecord = true;
$productInformation = $products->getData($filter, $getFirstRecord);

$filter = [
	['id', $productInformation['store_id']]
];
$getFirstRecord = true;
$storeInformation = $stores->getData($filter, $getFirstRecord);

if(empty($productInformation)) die('can not get store information, please check store id input!');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <title>BDM Mall - <?php echo $productInformation['name']. ' - ' . $storeInformation['name'];?></title>
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
            <h1> <?php echo $productInformation['name'];?></h1>
            <!--h1>Jordan 1 Retro High OFF-WHITE University Blue</h1-->
            <h2><?php echo $productInformation['price'];?> ₫</h2>
            <div class="row">
                <div class="col p-6 t-6 m-12">
                    <section id="snackbar-container"></section>
                    <div class="center-btn">
                        <button class="buy-add btn-success" onclick="add_btn()">Add To Cart</button>
                    </div>
                </div>
                <div class="col p-6 t-6 m-12">
                    <div class="center-btn">
                        <button class="buy-add" onclick="buy_btn()">Buy Now</button>
                    </div>
                </div>
            </div>
            <hr>
            <h1>Product's details</h1>
            <h2>CODE: AQ0818-148</h2>
            <h2>COLORWAY: WHITE/DARK POWDER BLUE-CONE</h2>
            <div class="row product-detail">
                <div class="col p-6 t-6 m-12">
                    <img src="product-detail/jordan1.webp" alt="store" class="product-detail-img">
                </div>
                <div class="col p-6 t-6 m-12">
                    <img src="product-detail/jordan2.webp" alt="store" class="product-detail-img">
                </div>
                <div class="col p-6 t-6 m-12">
                    <img src="product-detail/jordan3.webp" alt="store" class="product-detail-img">
                </div>
                <div class="col p-6 t-6 m-12">
                    <img src="product-detail/jordan4.webp" alt="store" class="product-detail-img">
                </div>
            </div>
            <hr>
            <h1>RECOMMENDED PRODUCTS</h1>
            <div class="row">
				<?php 
					$storeList = $stores->getData();
					$countStore = 1;
					foreach($storeList as $storeInformation) {
						if($countStore > 4) {
							//show only 4 items recommended product 
							break;
						} 
						$filter = [
							['featured_in_mall', "TRUE"],
							['store_id', $storeInformation['id']],
							['id', '!=', $_GET['id']]
						];
						$getFirstRecord = true;
						$productFeaturedItem = $products->getData($filter, $getFirstRecord);

						if(!empty($productFeaturedItem)) {
							$countStore++;
							echo '<div class="col p-3 t-6 m-12">
								<div class="products">
									<a href="store.php?id=' . $storeInformation['id'] . '"><h3>' . $storeInformation['name'] . '</h3></a>
									<a href="product-detail.php?id=' . $productFeaturedItem['id'] . '">
										<img src="products-img/burberry-bag.webp" alt="store" class="products-img">
										<h4>' . $productFeaturedItem['name'] . '</h4>
										<h4>' . $productFeaturedItem['price'] . ' ₫</h4>
									</a>
								</div>
							</div>';
						}
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
        
          <script src="javascript/checkLoginProduct.js"></script>
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
                <a href="browse-by-name.html">Browse Stores by Name</a>
                |
                <a href="browse-by-category.html">Browse Stores by Category</a>
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
                <a href="ToS.html">Term of Service</a>
                |
                <a href="privacy.html">Privacy Policy</a>
                |
                <a href="copyright.html">Copyright</a>
            </p>
            <p class="footer__company-name">© 2021 BDM Team.</p>
        </div>
    </footer>
</html>