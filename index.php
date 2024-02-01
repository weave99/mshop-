<?php
include_once("includes/conn.php");
session_start();
// ==================== ADD TO CART here ============================//

if( isset($_POST['submit']) && $_POST['submit']=='ADD TO CART' )
{
    $email= $_SESSION['user_name'];
    $prod_id= $_POST['prod_id'];
    $unit_price= $_POST['unit_price'];
    $qty= $_POST['qty'];	

//`user_id`, `name`, `profile_img`, `gender`, `address`, `mobile_no`, `email`, `verify_otp`,
// `logout_time`, `login_time` SELECT * FROM `users` WHERE 1

    $sql3="select user_id from users where email='$email'";
    $query3=mysqli_query($conn,$sql3);
   
    $user_id=0;
    if($f=mysqli_fetch_array($query3))
        $user_id=$f['user_id'];
        
        //`cart_id`, `user_id`, `prod_id`, `unit_price`, `qty`SELECT * FROM `cart_details` WHERE 1
		$inst_query = "INSERT INTO cart_details (user_id, prod_id, unit_price, qty) VALUES ('$user_id','$prod_id','$unit_price','$qty')";
        $add = mysqli_query($conn,$inst_query);
		if($add)
		{
			header("Location:cart_details.php");
		}
}

// ==================== ADD TO CART here ============================//
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MONDAL BHANDER</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="img/logo/favicon.png" type="image/png" />
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    </head>
    <body>

        <!-- preloader -->
       
        <div id="preloader">
            <div id="loading-center">
                <img src="img/logo/logo-loader.gif" alt="" id="loader">
            </div>
        </div>
     
        <!-- preloader-end -->


        <!-- Website Header -->
        <?php
            include 'website_header.php';
        ?>
        <!-- Website Header end -->


        <!-- main-area -->
        <main>
            <!-- slider-area -->
            <section class="slider-area" data-background="img/bg/slider_area_bg.jpg">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-7">
                            <div class="slider-active">
                                <div class="single-slider slider-bg" data-background="img/slider/header-banner/slider01.jpg">
                                    <div class="slider-content">
                                        <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s" style="font-weight: 700 !important;"><b>FOR ALL YOUR</b></h5>
                                        <h2 class="title" data-animation="fadeInUp" data-delay=".4s">GROCERY<br> ESSENTIALS</h2>
                                        <h4 data-animation="fadeInUp" data-delay=".6s" style="color:#fff;">MAKE HEALTHY CHOICES</h4>
                                        <a href="products.php" class="btn rounded-btn" data-animation="fadeInUp" data-delay=".8s">Shop Now</a>
                                    </div>
                                </div>
                                <div class="single-slider slider-bg" data-background="img/slider/header-banner/slider02.jpg">
                                    <div class="slider-content">
                                        <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s" style="font-weight: 700 !important;"><b>HEALTHY & TASTY !</b></h5><br><br><br><br><br><br><br><br><br><br><br>
                                        <!--<h2 class="title" data-animation="fadeInUp" data-delay=".4s">Time Grocery</h2>
                                        <p data-animation="fadeInUp" data-delay=".6s">Get up to 50% OFF Today Only</p>-->
                                        <a href="products.php" class="btn rounded-btn" data-animation="fadeInUp" data-delay=".8s">Shop Now</a>
                                    </div>
                                </div>
                                <div class="single-slider slider-bg" data-background="img/slider/header-banner/slider03.jpg">
                                    <div class="slider-content">
                                        <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s" style="font-weight: 700 !important;"><b>FRESH ORGANIC</b></h5>
                                        <h2 class="title" data-animation="fadeInUp" data-delay=".4s">VEGETABLES</h2>
                                        <h4 data-animation="fadeInUp" data-delay=".6s"style="color:#fff;">Taste the freshness of nature's bounty in<br> every bite of our hand-picked vegetables.</h4>
                                        <a href="products.php" class="btn rounded-btn" data-animation="fadeInUp" data-delay=".8s">Shop Now</a>
                                    </div>
                                </div>
                                <div class="single-slider slider-bg" data-background="img/slider/header-banner/slider04.jpg">
                                    <div class="slider-content">
                                        <h4 class="sub-title" data-animation="fadeInUp" data-delay=".2s" style="font-weight: 700 !important;"><b>SPECIAL </b></h4>
                                        <h2 class="title" data-animation="fadeInUp" data-delay=".4s" style="color:#eb3d6b;">DELICIOUS ICE CREAM</h2>
                                        <h4 data-animation="fadeInUp" data-delay=".6s" style="color:#fff;">REAL MILK. REAL ICE CREAM.</h4>
                                        <a href="products.php" class="btn rounded-btn" data-animation="fadeInUp" data-delay=".8s">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="slider-banner-img mb-20">
                                <a href="products.php"><img src="img/slider/header-banner/slider_banner001.jpg" alt=""></a>
                            </div>
                            <div class="slider-banner-img">
                                <a href="products.php"><img src="img/slider/header-banner/slider_banner_002.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="slider-banner-img">
                                <a href="products.php"><img src="img/slider/header-banner/slider_banner003.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- slider-area-end -->

            <!-- discount-area -->
            <section class="discount-area pt-30 pb-20">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6 col-md-8">
                            <div class="discount-item mb-20">
                                <div class="discount-thumb">
                                    <img src="img/slider/discount-banner/discount_img001.jpg" alt="">
                                </div>
                                <div class="discount-content">
                                    <span>Delight Store</span>
                                    <h4 class="title"><a href="products.php">Rise to Your Best Health</a></h4>
                                    <a href="products.php" class="btn">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-8">
                            <div class="discount-item mb-20">
                                <div class="discount-thumb">
                                    <img src="img/slider/discount-banner/discount_img0002.jpg" alt="">
                                </div>
                                <div class="discount-content">
                                    <span>Save 30%</span>
                                    <h5 class="title"><a href="products.php">Grocery Product </a></h5>
                                    <a href="products.php" class="btn">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-8">
                            <div class="discount-item style-two mb-20">
                                <div class="discount-thumb">
                                    <img src="img/slider/discount-banner/discount_img003.jpg" alt="">
                                </div>
                                <div class="discount-content">
                                    <span class="text-dark">Sampoo & Conditioner</span>
                                    <h4 class="title"><a href="products.php">Fresh Life Fresh Here</a></h4>
                                    <a href="products.php" class="btn">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- discount-area-end -->



            <!-- special-products-area -->
            <section class="special-products-area gray-bg pb-20">
                <div class="container">
                    <div class="row align-items-end mb-20">
                        <div class="col-md-8 col-8 pt-4">
                            <div class="section-title">
                                <!--<span class="sub-title">Awesome Shop</span>-->
                                <h2 class="title">Our Special Products</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-4 pt-4">
                            <div class="section-btn text-left text-md-right">
                                <a href="product_our_special.php" class="btn">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="special-products-wrap">
                        <div class="row">
                            <div class="col-3 d-none d-lg-block">
                                <div class="special-products-add">
                                    <div class="sp-add-thumb">
                                        <img src="img/slider/discount-banner/special_products_add.jpg" alt="">
                                    </div>
                                    <div class="sp-add-content">
                                        <span class="sub-title">BEST ORGANIC</span>
                                        <h4 class="title">GROCERY <b>COLLECTIONS</b></h4>
                                        <p>Offer UpTo 10% OFF</p>
                                        <a href="products.php" class="btn rounded-btn">shop now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="row justify-content-center">

                                <!-------------------Product Loop Start =================-->
                                <?php
                                //SELECT `prod_id`, `category_id`, `prod_brand`, `prod_name`, `prod_decs`, `prod_mrp`, `prod_price`, `prod_discount`, 
                                //`prod_img_1`, `prod_img_2`, `prod_img_3`, `prod_img_4`, `prod_stock`, `prod_live`, `prod_best` FROM `product_details` WHERE 1

                                $live_sql="SELECT * FROM web_prd_manage_product_details  WHERE prod_live=1 order by prod_id DESC LIMIT 12";
                                $live_query=mysqli_query($conn,$live_sql);
                                while($live_product=mysqli_fetch_array($live_query)) 
                                {?>

                                    <div class="col-xl-3 col-md-4 col-sm-6 col-4">
                                        <div class="sp-product-item mb-20">
                                            <div class="sp-product-thumb">
                                                <span class="batch"><?php echo $live_product['prod_discount'];?> off</span>

                                                <a href="product_details.php?prod_id=<?php echo $live_product['prod_id'];?>"><img src="img/product/<?php echo $live_product['prod_img_1'];?>" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                
                                                <h6 class="title"><a href="product_details.php?prod_id=<?php echo $live_product['prod_id'];?>"><?php echo $live_product['prod_name'];?></a></h6>
                                                <!--<span class="product-status">Out of Stock</span>-->

                                                <p class="pt-2"><span>₹</span><?php echo $live_product['prod_price'];?></p>

                                                <h6 class="title pt-2" > M.R.P.: <del> ₹<?php echo $live_product['prod_mrp'];?></del></h6>
                                <!--
                                                <div class="pt-3">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="prod_id" value="<?php echo $live_product['prod_id'];?>">
                                                        <input type="hidden" name="prod_name" value="<?php echo $live_product['prod_name'];?>">                                    
                                                        <input type="hidden" name="unit_price" value="<?php echo $live_product['prod_price'];?>">
                                                        <input type="hidden" name="qty" value="1">
                                                        <input type="submit" name="submit"  class="btn" value="ADD TO CART">
                                                    </form>
                                                </div>
                                -->
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>   
                                <!-------------------Product Loop End =================-->




                                    <!--*************Product Demo ****************--><!--
                                    <div class="col-xl-3 col-md-4 col-sm-6 col-4">
                                        <div class="sp-product-item mb-20">
                                            <div class="sp-product-thumb">
                                                <span class="batch">15% off</span>
                                                <a href="shop-details.html"><img src="img/product/sp_products001.png" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="title"><a href="">Uncle Bens Vanla Ready Pice</a></h6>
                                                <span class="product-status">Out of Stock</span>
                                                <p class="pt-2">Rs 150 - 1 kg</p>
                                                <div class="pt-3">
                                                    <form action="#" method="post">
                                                        <input type="submit" class="btn" value="Add To Cart">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    --><!--*************Product Demo ****************-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- special-products-area-end -->

            <!-- coupon-area -->
            <div class="coupon-area gray-bg pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-bg">
                                <div class="coupon-title text-center">
                                    
                                    <h3 class="title">FOOD ESSENTIALS OFFER ZONE</h3>
                                    <span>STAY HEALTHY & STAY FIT</span>
                                </div>
                                <!--
                                <div class="coupon-code-wrap">
                                    <h5 class="code">ganic21abs</h5>
                                    <img src="img/images/coupon_code.png" alt="">
                                </div>
                                -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- coupon-area-end -->



            <!-- best-sellers-area ====-->
            <section class="best-sellers-area">
                <div class="container">
                    <div class="row align-items-end mb-20">
                        <div class="col-md-8 col-8 pt-4">
                            <div class="section-title">
                                <!--<span class="sub-title">Best Sellers</span>-->
                                <h2 class="title">Best Offers View</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-4 pt-4">
                            <div class="section-btn text-left text-md-right">
                                <a href="product_best_offer.php" class="btn">View All</a>
                            </div>
                        </div>
                    </div>

                    <div class="best-sellers-products">
                        <div class="row justify-content-center">

                        <!-------------------Product Loop Start =================-->
                        <?php
                        //SELECT `prod_id`, `category_id`, `prod_brand`, `prod_name`, `prod_decs`, `prod_mrp`, `prod_price`, `prod_discount`, 
                        //`prod_img_1`, `prod_img_2`, `prod_img_3`, `prod_img_4`, `prod_stock`, `prod_live`, `prod_best` FROM `product_details` WHERE 1

                        $best_sql="SELECT * FROM web_prd_manage_product_details  WHERE prod_best=1 order by prod_id DESC LIMIT 5";
                        $best_query=mysqli_query($conn,$best_sql);
                        while($best_product=mysqli_fetch_array($best_query)) 
                        {?>

                            <div class="col-lg-3 col-md-4 col-sm-6 col-4">
                                    <div class="sp-product-item mb-20">
                                        <div class="sp-product-thumb">
                                            <span class="batch"><?php echo $best_product['prod_discount'];?> off</span>

                                            <a href="product_details.php?prod_id=<?php echo $best_product['prod_id'];?>"><img src="img/product/<?php echo $best_product['prod_img_1'];?>" alt=""></a>
                                        </div>
                                        <div class="sp-product-content">
                                           
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            
                                            <h6 class="title"><a href="product_details.php?prod_id=<?php echo $best_product['prod_id'];?>"><?php echo $best_product['prod_name'];?></a></h6>
                                            <!--<span class="product-status">Out of Stock</span>-->


                                            <p class="pt-2"><span>₹</span><?php echo $best_product['prod_price'];?></p>

                                            <h6 class="title pt-2" > M.R.P.: <del> ₹<?php echo $best_product['prod_mrp'];?></del></h6>

                                        <!--
                                            <div class="pt-3">
                                                <form action="" method="post">
                                                    <input type="hidden" name="prod_id" value="<?php echo $best_product['prod_id'];?>">
                                                    <input type="hidden" name="prod_name" value="<?php echo $best_product['prod_name'];?>">                                    
                                                    <input type="hidden" name="unit_price" value="<?php echo $best_product['prod_price'];?>">
                                                    <input type="hidden" name="qty" value="1">
                                                    <input type="submit" name="submit"  class="btn" value="ADD TO CART">
                                                </form>
                                            </div>
                                        -->
                                        </div>
                                    </div>
                            </div>

                        <?php
                        }
                        ?>   
                        <!-------------------Product Loop End =================-->

                            <!--*************Product Demo ****************--><!--
                            <div class="col-lg-3 col-md-4 col-sm-6 col-4">
                                    <div class="sp-product-item mb-20">
                                        <div class="sp-product-thumb">
                                            <span class="batch">15% off</span>
                                            <a href="shop-details.html"><img src="img/product/sp_products001.png" alt=""></a>
                                        </div>
                                        <div class="sp-product-content">
                                            
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            
                                            <h6 class="title"><a href="">Uncle Bens Vanla Ready Pice</a></h6>
                                            <span class="product-status">Out of Stock</span>

                                            <p class="pt-2"><span>₹</span> 100</p>

                                            <small>M.R.P.: ₹ 500</small>


                                            <div class="pt-3">
                                                <form action="#" method="post">
                                                    <input type="submit" class="btn" value="Add To Cart">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            --><!--*************Product Demo ****************-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- best-sellers-area-end -->




            <!-- discount-area -->
            <section class="discount-style-two pt-20 pb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="discount-item-two">
                                <div class="discount-thumb">
                                    <img src="img/slider/discount-banner/s_discount_img001.jpg" alt="">
                                </div>
                                <div id="custom-discount-content">
                                    <div class="discount-content">
                                        <span>Diffrent Flavors for</span>
                                        <h5 class="title"><a href="products.php"> Diffrent Movement</a></h5>
                                        <p>Can't eat just one !</p>
                                        <a href="products.php" class="btn rounded-btn">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="discount-item-two">
                                <div class="discount-thumb">
                                    <img src="img/slider/discount-banner/s_discount_img002.jpg" alt="">
                                </div>
                                <div id="custom-discount-content">
                                    <div class="discount-content">
                                        <span>Become unstoppable</span>
                                        <h4 class="title"><a href="products.php">Cold Drinks </a></h4>
                                        <p>Refresh your power</p>
                                        <a href="products.php" class="btn rounded-btn">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- discount-area-end -->

        </main>
        <!-- main-area-end -->


        <!-- footer-area -->
            <?php
                include 'website_footer.php';
            ?>
        <!-- footer-area-end -->





		<!-- JS here -->
        <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/vendor/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>

</html>



<!-- category-area -->
<!--             
<div class="container custom-container">
                    <div class="slider-category-wrap">
                        <div class="row category-active">
                            <div class="col-lg-2">
                                <div class="category-item active">
                                    <a href="products.php" class="category-link"></a>
                                    <div class="category-thumb">
                                        <img src="img/product/category_img01.png" alt="">
                                    </div>
                                    <div class="category-content">
                                        <h6 class="title">Juice & Drinks</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="category-item">
                                    <a href="products.php" class="category-link"></a>
                                    <div class="category-thumb">
                                        <img src="img/product/category_img02.png" alt="">
                                    </div>
                                    <div class="category-content">
                                        <h6 class="title">Vegetables</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="category-item">
                                    <a href="products.php" class="category-link"></a>
                                    <div class="category-thumb">
                                        <img src="img/product/category_img03.png" alt="">
                                    </div>
                                    <div class="category-content">
                                        <h6 class="title">Fresh Nuts</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="category-item">
                                    <a href="products.php" class="category-link"></a>
                                    <div class="category-thumb">
                                        <img src="img/product/category_img04.png" alt="">
                                    </div>
                                    <div class="category-content">
                                        <h6 class="title">Cleaning</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="category-item">
                                    <a href="products.php" class="category-link"></a>
                                    <div class="category-thumb">
                                        <img src="img/product/category_img05.png" alt="">
                                    </div>
                                    <div class="category-content">
                                        <h6 class="title">fresh meat</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="category-item">
                                    <a href="products.php" class="category-link"></a>
                                    <div class="category-thumb">
                                        <img src="img/product/category_img06.png" alt="">
                                    </div>
                                    <div class="category-content">
                                        <h6 class="title">Powders</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
-->
<!-- category-area-end -->

            <!-- best-deal-area -->
            <!--
            <section class="best-deal-area pt-60 pb-80">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-9">
                            <div class="best-deal-top-wrap">
                                <div class="bd-section-title">
                                    <h3 class="title">Best Deals <span>of this Week!</span></h3>
                                    <p>A virtual assistant collects the products from your list</p>
                                </div>
                                <div class="coming-time" data-countdown="2021/10/20"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row best-deal-active">
                        <div class="col-xl-3">
                            <div class="best-deal-item">
                                <div class="best-deal-thumb">
                                    <a href="shop-details.html"><img src="img/product/best_deal_product01.png" alt=""></a>
                                </div>
                                <div class="best-deal-content">
                                    <div class="main-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h4 class="title"><a href="shop-details.html">Walnuts Max</a></h4>
                                        <p>$1.50/ kg</p>
                                    </div>
                                    <div class="icon"><a href="shop-details.html">+</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="best-deal-item">
                                <div class="best-deal-thumb">
                                    <a href="shop-details.html"><img src="img/product/best_deal_product02.png" alt=""></a>
                                </div>
                                <div class="best-deal-content">
                                    <div class="main-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h4 class="title"><a href="shop-details.html">Fresh Nuts</a></h4>
                                        <p>$3.50/ kg</p>
                                    </div>
                                    <div class="icon"><a href="shop-details.html">+</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="best-deal-item">
                                <div class="best-deal-thumb">
                                    <a href="shop-details.html"><img src="img/product/best_deal_product03.png" alt=""></a>
                                </div>
                                <div class="best-deal-content">
                                    <div class="main-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h4 class="title"><a href="shop-details.html">Fresh Butter</a></h4>
                                        <p>$5.50/ kg</p>
                                    </div>
                                    <div class="icon"><a href="shop-details.html">+</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="best-deal-item">
                                <div class="best-deal-thumb">
                                    <a href="shop-details.html"><img src="img/product/best_deal_product04.png" alt=""></a>
                                </div>
                                <div class="best-deal-content">
                                    <div class="main-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h4 class="title"><a href="shop-details.html">Mat Orange</a></h4>
                                        <p>$9.00/ kg</p>
                                    </div>
                                    <div class="icon"><a href="shop-details.html">+</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="best-deal-item">
                                <div class="best-deal-thumb">
                                    <a href="shop-details.html"><img src="img/product/best_deal_product05.png" alt=""></a>
                                </div>
                                <div class="best-deal-content">
                                    <div class="main-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h4 class="title"><a href="shop-details.html">France Potato</a></h4>
                                        <p>$3.99/ kg</p>
                                    </div>
                                    <div class="icon"><a href="shop-details.html">+</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            -->
            <!-- best-deal-area-end -->