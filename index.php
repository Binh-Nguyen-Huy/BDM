<?php include_once "file_exist.php" ?>
<?php
include("global_func.php");
$stores = new CSVHandler('data/stores.csv');
$products = new CSVHandler('data/products.csv');
// $filter = [
	// ['featured', "true"]
// ];
// $storeInformation = $stores->getData($filter);
//if(empty($storeInformation)) die('can not get store information, please check store id input!');
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
            <div class="row">
                <div class="col p-12 t-12 m-12">
                    <div>
                        <img src="banner.webp" alt="banner" class="banner">
                    </div>
                </div>
            </div>
            <h1>NEW STORE</h1>
            <h2>Bring the newest brands to you</h2>
            <div class="row">
                <div class="col p-12 t-12 m-12 carousel-pc">
                    <div class="carousel-multiple-logo-pc">
						<?php 
							$storeList = $stores->sort('created_time', 'date', 'desc')->getData();
							$countItem = 1;
							foreach($storeList as $storeInformation) {
								if($countItem > 8) 
									break;
								echo '<div>
									  <div class="box">
										<a href="store.php?id=' . $storeInformation['id'] . '"><img src="store-img/lv.webp" alt="' . $storeInformation['name'] . '" class="store-logo"></a>
									  </div>
									</div>';
								$countItem++;
							}
						?>
                    </div>
                </div>
                <div class="col p-12 t-12 m-12 carousel-tablet">
                    <div class="carousel-multiple-logo-tablet">
						<?php 
							$countItem = 1;
							foreach($storeList as $storeInformation) {
								if($countItem > 8) 
									break;
								echo '<div>
									  <div class="box">
										<a href="store.php?id=' . $storeInformation['id'] . '"><img src="store-img/lv.webp" alt="' . $storeInformation['name'] . '" class="store-logo"></a>
									  </div>
									</div>';
								$countItem++;
							}
						?>
                    </div>
                </div>
                <div class="col p-12 t-12 m-12 carousel-phone">
                    <div class="carousel-multiple-logo-phone">
                        <?php 
							$countItem = 1;
							foreach($storeList as $storeInformation) {
								if($countItem > 8) 
									break;
								echo '<div>
									  <div class="box">
										<a href="store.php?id=' . $storeInformation['id'] . '"><img src="store-img/lv.webp" alt="' . $storeInformation['name'] . '" class="store-logo"></a>
									  </div>
									</div>';
								$countItem++;
							}
						?>
                    </div>
                </div>
            </div>
            <h1>NEW PRODUCTS</h1>
            <h2>Latest drops from coolest shops</h2>
            <div class="row">
				
                <div class="col p-12 t-12 m-12 carousel-pc">
                    <div class="carousel-multiple-products-pc">
						<?php 
							$storeList = $stores->getData();
							$countItem = 1;
							foreach($storeList as $storeInformation) {
								if($countItem > 8)
									break;
								
								$filter = [
									['featured_in_store', "TRUE"],
									['store_id', $storeInformation['id']]
								];
								$productItemSorted = $products->sort('created_time', 'date', 'desc')->getData($filter);
								if(!empty($productItemSorted)) {
									$countItem++;
									echo '<div>
										  <div class="box">
											<div class="products">
												<a href="store.php?id=' . $storeInformation['id'] . '"><h3>' . $storeInformation['name'] . '</h3></a>
												<a href="product-detail.php?id=' . $productItemSorted[0]['id'] . '">
													<img src="products-img/assc-shirt.webp" alt="store" class="products-img">
													<table>
													   <tr>
															<td>
															<h4>' . $productItemSorted[0]['name'] . '</h4>
															</td>
														</tr>
														<tr>
															<td>
															<h4>' . $productItemSorted[0]['price'] . ' ₫</h4>
															</td>
														</tr> 
													</table>
												</a>
											</div>
										  </div>
										</div>';
								}
							}
						?>
                    </div>
                </div>
                <div class="col p-12 t-12 m-12 carousel-tablet">
                    <div class="carousel-multiple-products-tablet">
						<?php 
							$storeList = $stores->getData();
							$countItem = 1;
							foreach($storeList as $storeInformation) {
								if($countItem > 8)
									break;
								
								$filter = [
									['featured_in_store', "TRUE"],
									['store_id', $storeInformation['id']]
								];
								$productItemSorted = $products->sort('created_time', 'date', 'desc')->getData($filter);
								if(!empty($productItemSorted)) {
									$countItem++;
									echo '<div>
										  <div class="box">
											<div class="products">
												<a href="store.php?id=' . $storeInformation['id'] . '"><h3>' . $storeInformation['name'] . '</h3></a>
												<a href=product-detail.php?id=' . $productItemSorted[0]['id'] . '">
													<img src="products-img/assc-shirt.webp" alt="store" class="products-img">
													<table>
													   <tr>
															<td>
															<h4>' . $productItemSorted[0]['name'] . '</h4>
															</td>
														</tr>
														<tr>
															<td>
															<h4>' . $productItemSorted[0]['price'] . ' ₫</h4>
															</td>
														</tr> 
													</table>
												</a>
											</div>
										  </div>
										</div>';
								}
							}
						?>
                    </div>
                </div>
                <div class="col p-12 t-12 m-12 carousel-phone">
                    <div class="carousel-multiple-products-phone">
						<?php 
							$storeList = $stores->getData();
							$countItem = 1;
							foreach($storeList as $storeInformation) {
								if($countItem > 8)
									break;
								
								$filter = [
									['featured_in_store', "TRUE"],
									['store_id', $storeInformation['id']]
								];
								$productItemSorted = $products->sort('created_time', 'date', 'desc')->getData($filter);
								if(!empty($productItemSorted)) {
									$countItem++;
									echo '<div>
										  <div class="box">
											<div class="products">
												<a href="store.php?id=' . $storeInformation['id'] . '"><h3>' . $storeInformation['name'] . '</h3></a>
												<a href=product-detail.php?id=' . $productItemSorted[0]['id'] . '">
													<img src="products-img/assc-shirt.webp" alt="store" class="products-img">
													<table>
													   <tr>
															<td>
															<h4>' . $productItemSorted[0]['name'] . '</h4>
															</td>
														</tr>
														<tr>
															<td>
															<h4>' . $productItemSorted[0]['price'] . ' ₫</h4>
															</td>
														</tr> 
													</table>
												</a>
											</div>
										  </div>
										</div>';
								}
							}
						?>
                    </div>
                </div>
            </div>
            <h1>FEATURED STORE</h1>
            <h2>From brands that are top of the line</h2>
            <div class="row">
				<?php 
					$filter = [
						['featured', "TRUE"]
					];
					$storeFeaturedList = $stores->getData($filter);
					foreach($storeFeaturedList as $storeFeaturedItem) {
						echo '<div class="col p-3 t-6 m-12">
								<div>
									<a href="store.php?id=' . $storeFeaturedItem['id'] . '"><img src="store-img/bape.webp" alt="store" class="store-logo"></a>
								</div>
							</div>';
					}
				?>
            </div>
            <h1>FEATURED PRODUCTS</h1>
            <h2>The best of the best</h2>
            <div class="row">
				<?php 
					$storeList = $stores->getData();
					foreach($storeList as $storeInformation) {
						$filter = [
							['featured_in_mall', "TRUE"],
							['store_id', $storeInformation['id']]
						];
						$getFirstRecord = true;
						$productFeaturedItem = $products->getData($filter, $getFirstRecord);
						if(!empty($productFeaturedItem)) {
							echo '<div class="col p-3 t-6 m-12">
								<div class="products">
									<a href="store.php?id=' . $storeInformation['id'] . '"><h3>' . $storeInformation['name'] . '</h3></a>
									<a href="product-detail.php?id=' . $productFeaturedItem['id'] . '">
										<img src="products-img/nike-jordan.webp" alt="store" class="products-img">
										<table>
											<tr>
												<td>
													<h4>' . $productFeaturedItem['name'] . '</h4>
												</td>
											</tr>
											<tr>
												<td>
													<h4>' . $productFeaturedItem['price'] . ' ₫</h4>
												</td>
											</tr> 
										</table>
									</a>
								</div>
							</div>';
						}
					}
				?>
            </div>
            <script src="javascript/carousel.js"></script>
            <script>

                new ElderCarousel('.carousel-multiple-logo-pc', { items: 5 })
                new ElderCarousel('.carousel-multiple-logo-tablet', { items: 3 })
                new ElderCarousel('.carousel-multiple-logo-phone', { items: 1 })

                new ElderCarousel('.carousel-multiple-products-pc', { items: 5 })
                new ElderCarousel('.carousel-multiple-products-tablet', { items: 3 })
                new ElderCarousel('.carousel-multiple-products-phone', { items: 1 })

            </script>
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