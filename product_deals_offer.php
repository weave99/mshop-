<?php
include_once("includes/conn.php");
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MONDAL BHANDER | DEALS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/logo/favicon.png" type="image/png" />

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


            <!-- special-products-area -->
            <section class="special-products-area pt-35 pb-50 gray-bg">
                <div class="container">
                    <div class="row align-items-end mb-50">
                        <div class="col-md-12 col-sm-12">
                            <div class="section-title">
                                <!--<span class="sub-title">Awesome Shop</span>-->
                                <h2 class="title">Best Deals</h2>
                            </div>
                        </div>
                    </div>
                    <div class="special-products-wrap  mb-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">

                                <!-------------------Product Loop Start =================-->
                                <?php
                                    //`category_id`, `category_name` SELECT * FROM `web_prd_manage_category` WHERE 1
                                    //category_id `prod_deals`, `prod_live`, `prod_deals` SELECT * FROM `web_prd_manage_product_details` WHERE 1
                                    $prod_deals_sql="SELECT * FROM web_prd_manage_product_details  WHERE prod_deals=1";
                                    $best_query=mysqli_query($conn,$prod_deals_sql);
                                    while($deals_product=mysqli_fetch_array($best_query)) 
                                    {?>
                                        <div class="col-xl-2 col-md-4 col-sm-6 col-4">
                                            <div class="sp-product-item mb-20">
                                                <div class="sp-product-thumb">
                                                    <span class="batch"><?php echo $deals_product['prod_discount'];?> off</span>

                                                    <a href="product_details.php?prod_id=<?php echo $deals_product['prod_id'];?>"><img src="img/product/<?php echo $deals_product['prod_img_1'];?>" alt=""></a>
                                                </div>
                                                <div class="sp-product-content">
                                                    
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    
                                                    <h6 class="title search_page_padding"><a href="product_details.php?prod_id=<?php echo $deals_product['prod_id'];?>"><?php echo $deals_product['prod_name'];?></a></h6>
                                                    <!--<span class="product-status">Out of Stock</span>-->

                                                    <p class="pt-2"><span>₹</span><?php echo $deals_product['prod_price'];?></p>

                                                    <h6 class="title pt-2" > M.R.P.: <del> ₹<?php echo $deals_product['prod_mrp'];?></del></h6>
                                                    <!--
                                                    <div class="pt-3">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="prod_id" value="<?php echo $deals_product['prod_id'];?>">
                                                            <input type="hidden" name="prod_name" value="<?php echo $deals_product['prod_name'];?>">                                    
                                                            <input type="hidden" name="unit_price" value="<?php echo $deals_product['prod_price'];?>">
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




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- special-products-area-end -->




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


