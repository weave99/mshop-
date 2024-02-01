<?php
include_once("includes/conn.php");
session_start();

// Important login
if(!isset($_SESSION['user_name'])){}
else{$session_user_name=$_SESSION['user_name'];}

$prod_id=$_REQUEST['prod_id'];




// ==================== Cart Form here ============================//
if( isset($_POST['submit']) && $_POST['submit']=='ADD TO CART')
{
    $prod_id= $_POST['prod_id'];
    $unit_price= $_POST['unit_price'];
    $qty= $_POST['qty'];	


    $sql3="select user_id from users where email='$session_user_name'";
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


if( isset($_POST['submit']) && $_POST['submit']=='ADD TO WISHLIST')
{
    $prod_id= $_POST['prod_id'];
    $unit_price= $_POST['unit_price'];
    $qty= "1";	


    $sql3="select user_id from users where email='$session_user_name'";
    $query3=mysqli_query($conn,$sql3);
   
    $user_id=0;
    if($f=mysqli_fetch_array($query3))
        $user_id=$f['user_id'];
        
        //`wishlist_id`, `user_id`, `prod_id`, `unit_price`, `qty`SELECT * FROM `wishlist` WHERE 1

		$inst_query = "INSERT INTO wishlist (user_id, prod_id, unit_price, qty) VALUES ('$user_id','$prod_id','$unit_price','$qty')";
        
        
        $add = mysqli_query($conn,$inst_query);
         
		if($add)
		{
			header("Location:wistlist_details.php");
		}
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MONDAL BHANDER | PRODUCT DETAILS</title>
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



        <?php
        //SELECT `prod_id`, `category_id`, `prod_brand`, `prod_name`, `prod_decs`, `prod_mrp`, `prod_price`, `prod_discount`, 
        //`prod_img_1`, `prod_img_2`, `prod_img_3`, `prod_img_4`, `prod_stock`, `prod_live`, `prod_best` FROM `product_details` WHERE 1

        $prod_id=$_REQUEST['prod_id'];
        $details_sql="SELECT * FROM web_prd_manage_product_details WHERE prod_id=$prod_id";
        $details_query=mysqli_query($conn,$details_sql);
        if($prod_details=mysqli_fetch_array($details_query)) 
        {?>

            <!-- main-area -->
            <main>

                <!-- breadcrumb-area -->
                <div class="breadcrumb-area breadcrumb-bg-two">
                    <div class="container custom-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb-content">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item" aria-current="page">Product Details</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb-area-end -->

                <!-- shop-details-area -->
                <section class="shop-details-area pt-90 pb-90">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="shop-details-flex-wrap">
                                    <div class="shop-details-nav-wrap">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="item-one-tab" data-toggle="tab" href="#item-one" role="tab" aria-controls="item-one" aria-selected="true"><img src="img/product/<?php echo $prod_details['prod_img_1'];?>" alt=""></a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="item-two-tab" data-toggle="tab" href="#item-two" role="tab" aria-controls="item-two" aria-selected="false"><img src="img/product/<?php echo $prod_details['prod_img_2'];?>" alt=""></a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="item-three-tab" data-toggle="tab" href="#item-three" role="tab" aria-controls="item-three" aria-selected="false"><img src="img/product/<?php echo $prod_details['prod_img_3'];?>" alt=""></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="shop-details-img-wrap">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="item-one" role="tabpanel" aria-labelledby="item-one-tab">
                                                <div class="shop-details-img">
                                                    <img src="img/product/<?php echo $prod_details['prod_img_1'];?>"  class="bg_color" alt="">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="item-two" role="tabpanel" aria-labelledby="item-two-tab">
                                                <div class="shop-details-img">
                                                    <img src="img/product/<?php echo $prod_details['prod_img_2'];?>" class="bg_color" alt="">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="item-three" role="tabpanel" aria-labelledby="item-three-tab">
                                                <div class="shop-details-img">
                                                    <img src="img/product/<?php echo $prod_details['prod_img_3'];?>" class="bg_color" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="shop-details-content">
                                    <h4 class="title"><?php echo $prod_details['prod_name'];?></h4>

                                    <div class="shop-details-price">
                                        <h2 class="price">₹ <?php echo $prod_details['prod_price'];?> </h2>
                                        <span> M.R.P.: ₹ <?php echo $prod_details['prod_mrp'];?></span>

                                        <h5 class="stock-status">- IN Stock</h5>
                                    </div>
                                    <p><?php echo $prod_details['prod_decs'];?></p>

                                    <!--
                                    <div class="shop-details-list">
                                        <ul>
                                            <li>Type : <span>Ice Cream</span></li>
                                            <li>XPD : <span>Aug 19.2021</span></li>
                                            <li>CO : <span>Ganic</span></li>
                                        </ul>
                                    </div>
                                    -->
                                <form action="" method="post">
                                    <!-- PRODUCT INFORMATION STORE -->
                                    <!--
                                    SELECT `prod_id`, `category_id`, `prod_brand`, `prod_name`, `prod_decs`, `prod_mrp`, `prod_price`, `prod_discount`, 
                                    `prod_img_1`, `prod_img_2`, `prod_img_3`, `prod_img_4`, `prod_stock`, `prod_live`, `prod_best` FROM `product_details` WHERE 1
                                    -->
                                    <input type="hidden" name="prod_id" value="<?php echo $prod_details['prod_id'];?>">
                                    <input type="hidden" name="prod_name" value="<?php echo $prod_details['prod_name'];?>">                                    
                                    <input type="hidden" name="unit_price" value="<?php echo $prod_details['prod_price'];?>">
                                    <input type="hidden" name="prod_decs" value="<?php echo $prod_details['prod_decs'];?>">
                                    <!-- PRODUCT INFORMATION STORE -->



                                    <div class="shop-perched-info pt-4">
                                        <div class="sd-cart-wrap">
                                            
                                            <div class="cart-plus-minus">
                                                <input type="number" name="qty" min="1" max="5" value="1">
                                            </div>
                                            
                                        </div>
                                        <button type="submit" name="submit" value="ADD TO CART" class="btn">ADD TO CART</button>
                                    </div>
                                    <div class="shop-details-bottom">
                                        <h5 class="title">
                                            <button type="submit" name="submit" value="ADD TO WISHLIST" class="btn bg-transparent text-dark"> <i class="far fa-heart"></i> ADD TO WISHLIST</button>
                                        </h5>
                                        <!--
                                        <ul>
                                            <li>
                                                <span>Tag : </span>
                                                <a href="#">ICE Cream</a>
                                            </li>
                                            <li>
                                                <span>CATEGORIES :</span>
                                                <a href="#">women's,</a>
                                                <a href="#">bikini,</a>
                                                <a href="#">tops for,</a>
                                                <a href="#">large bust</a>
                                            </li>
                                        </ul>
                                        -->
                                    </div>
                                </form>

                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="row">
                            <div class="col-12">
                                <div class="product-desc-wrap">
                                    <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab"
                                                aria-controls="details" aria-selected="true">Product Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="val-tab" data-toggle="tab" href="#val" role="tab" aria-controls="val"
                                                aria-selected="false">Viewers Also Like</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                                aria-controls="review" aria-selected="false">Product Reviews</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContentTwo">
                                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                                            <div class="product-desc-content">
                                                <h4 class="title">Product Details</h4>
                                                <div class="row">
                                                    <div class="col-xl-3 col-md-5">
                                                        <div class="product-desc-img">
                                                            <img src="img/product/desc_img.jpg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-9 col-md-7">
                                                        <h5 class="small-title">100% Natural Vitamin</h5>
                                                        <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting, remaining Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                        <ul class="product-desc-list">
                                                            <li>65% poly, 35% rayon</li>
                                                            <li>Hand wash cold</li>
                                                            <li>Partially lined</li>
                                                            <li>Hidden front button closure with keyhole accents</li>
                                                            <li>Button cuff sleeves</li>
                                                            <li>Lightweight semi-sheer fabrication</li>
                                                            <li>Made in USA</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="val" role="tabpanel" aria-labelledby="val-tab">
                                            <div class="product-desc-content">
                                                <h4 class="title">Product Details</h4>
                                                <div class="row">
                                                    <div class="col-xl-3 col-md-5">
                                                        <div class="product-desc-img">
                                                            <img src="img/product/desc_img.jpg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-9 col-md-7">
                                                        <h5 class="small-title">100% Natural Vitamin</h5>
                                                        <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting, remaining Lorem
                                                        Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                        <ul class="product-desc-list">
                                                            <li>65% poly, 35% rayon</li>
                                                            <li>Hand wash cold</li>
                                                            <li>Partially lined</li>
                                                            <li>Hidden front button closure with keyhole accents</li>
                                                            <li>Button cuff sleeves</li>
                                                            <li>Lightweight semi-sheer fabrication</li>
                                                            <li>Made in USA</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                            <div class="product-desc-content">
                                                <h4 class="title">Product Details</h4>
                                                <div class="row">
                                                    <div class="col-xl-3 col-md-5">
                                                        <div class="product-desc-img">
                                                            <img src="img/product/desc_img.jpg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-9 col-md-7">
                                                        <h5 class="small-title">100% Natural Vitamin</h5>
                                                        <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting, remaining Lorem
                                                        Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                        <ul class="product-desc-list">
                                                            <li>65% poly, 35% rayon</li>
                                                            <li>Hand wash cold</li>
                                                            <li>Partially lined</li>
                                                            <li>Hidden front button closure with keyhole accents</li>
                                                            <li>Button cuff sleeves</li>
                                                            <li>Lightweight semi-sheer fabrication</li>
                                                            <li>Made in USA</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                </section>
                <!-- shop-details-area-end -->
            </main>
            <!-- main-area-end -->

        <?php
        }
        ?>
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

<!-- Mirrored from themebeyond.com/pre/ganic-prev/ganic-live/shop-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 18:14:01 GMT -->
</html>
