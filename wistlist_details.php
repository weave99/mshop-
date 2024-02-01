<?php
include_once("includes/conn.php");
require_once("includes/user_sequre_page.php");

if(isset($_POST['remove_cart']))	
{
       $wishlist_id1=$_POST['wishlist_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM `wishlist` WHERE wishlist_id='$wishlist_id1'");
      header("location:wistlist_details.php");
}

if( isset($_POST['submit']) && $_POST['submit']=='ADD TO CART' )
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
        $wishlist_id1=$_POST['wishlist_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM `wishlist` WHERE wishlist_id='$wishlist_id1'");
         
		if($add)
		{
			header("Location:cart_details.php");
		}

	
	
}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MONDAL BHANDER | WISTLIST</title>
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


        <script>
        function myFunction() {
            if (confirm("Are you sure to delete?") == true) {            
            return true;
            } else {
                return false;
                
            }
        }
    </script>
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

            <!-- breadcrumb-area -->
            <div class="breadcrumb-area breadcrumb-bg-two">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item"><a href="cart_details.php">Shopping Wishlist</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- cart-area -->
            <section class="h-100" style="background-color: #eee;">
                <div class="container-fluid h-100 py-2">

                    <?php
                    $sub_total=0;
                    //`user_id`, `name`, `street`, `city`, `country`, `postcode`, `mobile_no`, `user_name`, `password`SELECT * FROM `users` WHERE 1

                    //`cart_id`, `user_id`, `prod_id`, `unit_price`, `qty`, `color`SELECT * FROM `cart_details` WHERE 1

                    $sql3="SELECT * FROM wishlist WHERE user_id IN (select user_id from users where email='$session_user_name') order by wishlist_id";
                    $query3=mysqli_query($conn,$sql3);
                    $num=mysqli_num_rows($query3);
                    if($num>0)
                    {?>

                    <div class="row d-flex justify-content-center h-100">
                        <div class="col-xl-10">
                                <?php
                                while($prd=mysqli_fetch_array($query3))
                                {
                                    $wishlist_id1=$prd['wishlist_id'];
                                    $prod_id1=$prd['prod_id'];
                                    $unit_price1=$prd['unit_price'];
                                    $qty1=$prd['qty'];
                                    $query4=mysqli_query($conn,"select * from web_prd_manage_product_details where prod_id=$prod_id1");
                                    if($f=mysqli_fetch_array($query4)) 

                                    $brand_id=$f['brand_id'];
                                    $query5=mysqli_query($conn,"select * from web_prd_manage_brand where brand_id=$brand_id");
                                        if($f_brand=mysqli_fetch_array($query5))
    
                                     {
                                    ?>  

                                    <div class="card rounded-3 mb-4">
                                        <div class="card-body p-4">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-4 col-sm-6 col-md-3 col-lg-1">
                                                    <img src="img/product/<?php echo $f['prod_img_1'];?>" class="img-fluid rounded-3" alt="">
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-9 col-lg-3 ">
                                                    <p class="lead fw-normal mb-2"><?php echo $f['prod_name'];?></p>
                                                    <p>
                                                        <span class="text-muted">Brand : </span> <?php echo $f_brand['brand_name'];?>
                                                    </p>
                                                </div>

                                                <div class="col-4 col-md-3 col-lg-4 text-center" id="item_cart">
                                                    <div class="row">
                                                        <div class="col-lg-6 ">
                                                            
                                                            <h6 class="mb-0">₹ <?php echo number_format($unit_price1*$qty1,2);?> </h6>
                                                        </div>
                                                        <div class="col-lg-6">
                                                        <h6  class="mb-0" style="background-color:transparent; color:var(--color-primary);" >In Stock</h6>
                                                        
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-6 col-md-8 col-lg-2 col-xl-2">
                                                    <form action="" method="post">
                                                    <input type="hidden" name="prod_id" value="<?php echo $prd['prod_id'];?>">
                                                    <input type="hidden" name="wishlist_id" value="<?php echo $wishlist_id1;?>">
                                                    <input type="hidden" name="qty" placeholder="1" value="<?php echo $qty1;?>">
                                                    <input type="hidden" name="unit_price" value="<?php echo $unit_price1;?>">                                                    
                                                    <button type="submit" name="submit" value="ADD TO CART" class="rounded-pill btn btn-outline-dark">Add to Cart</button>
                                                    </form>
                                                </div>
                                                

                                                
                                                <div class="col-2 col-md-1 col-lg-1 col-xl-1 text-right">
                                                    <form action="" method="post">
                                                    <input type="hidden" name="wishlist_id" value="<?php echo $wishlist_id1;?>">    
                                                    <button type="submit" name="remove_cart" class="text-danger"style="background:transparent;border: none;"><i class="fas fa-trash fa-lg"></i></button>
                                                </form>
                                                </div>
                                                
                    
                    
                                            </div>
                                        </div>
                                    </div>

                                    <?php 
                                    }
                                }?>  
                        </div>
                    </div>
                    <?php
                    }
                    else
                    { ?>
                    <div class="row d-flex justify-content-center h-100 ">
                            <div class="col-lg-12 py-5">
                                <div class="text-center">
                                    <img src="img/icon/emptywishlist.png" width="150px" alt="">
                                </div>                            

                                
                            </div>
                            <div class="col-lg-12 py-5 bg-white" >
                                <h1 class="text-center" style="font-family:arial;">Your Wishlist is <span style="color:red;">Empty!</span> </h1>
                                <p  class="text-center">Must add items on the cart before you proceed to check out.</p>

                                <div   class="text-center">
                                    <a href="index.php" class="btn btn-primary">RETURN TO SHOP</a>
                                </div>
                            </div>
                    </div>

                        <?php
                        }
                        ?>




                </div>



                
            </section>
            <!-- cart-area-end -->

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
