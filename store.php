<?php include_once "file_exist.php" ?>
<?php
include("global_func.php");
$products = new CSVHandler('data/products.csv');
$stores = new CSVHandler('data/stores.csv');
$storeId = $_GET['id'] ?? 0;
$filter = [
	['id', $storeId]
];
$getFirstRecord = true;
$storeInformation = $stores->getData($filter, $getFirstRecord);
if(empty($storeInformation)) die('can not get store information, please check store id input!');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initiap-scale=1.0">
        <script src="https://kit.fontawesome.com/caea2bcb89.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./Nike Store Page/style-store.css">
        <title><?php echo $storeInformation['name'];?></title>
    </head>

    <header>
        <div class="nav">
            <a href="store.php?id=<?php echo $_GET['id'];?>">
                <img src="./Nike Store Page/nike-logo.webp" alt="logo" class="logo" />
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
                                echo "<a href=\"nike_browse-by-time.php?id=$storeId\">Browse Products by Created Time</a>";
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
                            echo "<a href=\"nike_browse-by-time.php?id=$storeId\" class='nav_responsive-link'>Browse Products by Created Time</a>";
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
            <div class="row">
                <div class="col p-12 t-12 m-12">
                    <div>
                        <img src="./Nike Store Page/nike-banner.webp" alt="banner" class="banner">
                    </div>
                </div>
            </div>
            <hr>
            <h1>NEW PRODUCTS</h1>
            <h2>Latest drop for Swoosh-er</h2>
            <div class="row products">
				<?php
				$filter = [
					//['featured_in_store', "TRUE"],
					['store_id', $storeInformation['id']],
				];
				$product = $products->sort('created_time', 'date', 'desc')->getData($filter);
				$countItem = 1;
				foreach($product as $productItem) {
					if($countItem > 5)
						break;
					$date = strtotime($productItem['created_time']);
					
					echo '<div class="col p-3 t-6 m-12">
							<div class="products">
								<a href="product-detail.php?id=' . $productItem['id'] . '">
									<table>
										<tr>
											<th>' . $productItem['name'] . '</th>
										</tr>
									</table>   
									<img src="./Nike Store Page/nike-product/air-force1.webp" alt="store" class="products-img">
									<table>
										<tr class="description">
											<td colspan="2">
												CODE: DD3223-100<br>
												COLORWAY: WHITE/BLACK
											</td>
										</tr>
										<tr>
											<td class="price">' . $productItem['price'] . ' ₫</td>
											<td class="date">' . date('d/m/y', $date) . '</td>
										</tr>
									</table>
								</a>
							</div>
					</div>';
					$countItem++;
				}
				?>
            </div>
            <hr>
            <h1>FEATURED PRODUCTS</h1>
            <h2>Nike's choice for high fashion</h2>
            <div class="row">
				<?php
				$filter = [
					['featured_in_store', "TRUE"],
					['store_id', $storeInformation['id']],
				];
				$product = $products->getData($filter);
				foreach($product as $productItem) {
					$date = strtotime($productItem['created_time']);
					
					echo '<div class="col p-3 t-6 m-12">
							<div class="products">
								<a href="product-detail.php?id=' . $productItem['id'] . '">
									<table>
										<tr>
											<th>' . $productItem['name'] . '</th>
										</tr>
									</table>   
									<img src="./Nike Store Page/nike-product/air-force1.webp" alt="store" class="products-img">
									<table>
										<tr class="description">
											<td colspan="2">
												CODE: DD3223-100<br>
												COLORWAY: WHITE/BLACK
											</td>
										</tr>
										<tr>
											<td class="price">' . $productItem['price'] . ' ₫</td>
											<td class="date">' . date('d/m/y', $date) . '</td>
										</tr>
									</table>
								</a>
							</div>
					</div>';
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

          <script src="./Nike Store Page/nike-store.js"></script>
    </body>

    <footer class="footer__distributed">
        <div class="footer__left">
            <img src="./Nike Store Page/nike-logo.webp" class="footer__logo">
            <p class="footer__links">
                <a href="index.php">HOME</a>
                |
                <a href="nike_about-us.html">ABOUT US</a>
                |
                <a href="nike_browse-by-category.html">Browse Products by Category</a>
                |
                <?php
                     echo "<a href=\"nike_browse-by-time.php?id=$storeId\">Browse Products by Created Time</a>";
                ?>
                |
                <a href="nike_contact.html">CONTACT</a>
            </p>
        </div>
        <div class="footer__right">
            <p class="footer__company-about">
                <span>About <?php echo $storeInformation['name'];?></span>
                Our mission is what drives us to do everything possible to expand human potential. We do that by creating groundbreaking sport innovations, by making our products more sustainably, by building a creative and diverse global team and by making a positive impact in communities where we live and work. Based in Beaverton, Oregon, <?php echo $storeInformation['name'];?>, Inc. includes the <?php echo $storeInformation['name'];?>, Converse, and Jordan brands.</p>
            <div class="footer__icons">
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