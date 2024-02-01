<?php
include_once("includes/conn.php");
require_once("includes/user_sequre_page.php");
if(isset($_POST['remove_cart']))	
{
       $cart_id=$_POST['cart_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM `cart_details` WHERE cart_id='$cart_id'");
      header("location:checkout.php");
}
?>
<!doctype html>
<html class="no-js" lang="">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Checkout</title>
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
        
    <style>
        input:required::placeholder, textarea:required::placeholder{
        color: red;
        opacity: 1;
        }
    </style>
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
                                        <li class="breadcrumb-item"><a href="">Checkout</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- checkout-area -->
            <div class="checkout-area pt-90 pb-90">
                <div class="container">
                <?php
     //`order_id`, `user_id`, `transaction_id`, `transaction_ref_no`, `booking_date`, `amount`, `transaction_status`, `shipping_name`, `shipping_street`, 
     //`shipping_city`, `shipping_area`, `shipping_pin_code`, `shipping_message`, `shipping_mobile`, `shipping_email` SELECT * FROM `web_prd_customer_order` WHERE 1
		$user_sql="SELECT * FROM users WHERE email='$session_user_name'";
		$user_query=mysqli_query($conn,$user_sql);
		if($user_details=mysqli_fetch_array($user_query)) 
		{?>	
                 
                    <form action="techprocess.php" method="post">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="checkout-progress-wrap">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="checkout-progress-step">
                                        <ul>
                                            <li class="active">
                                                <div class="icon"><i class="fas fa-check"></i></div>
                                                <span>Shipping</span>
                                            </li>
                                            <li>
                                                <div class="icon">2</div>
                                                <span>Order Successful</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="checkout-form-wrap">
                                        <div class="checkout-form-top">
                                            <h5 class="">Contact information</h5>
                                        </div>
                                        <!--
                                        //`order_id`, `user_id`, `transaction_id`, `transaction_ref_no`, `booking_date`, `amount`, `transaction_status`, `shipping_name`, `shipping_street`, 
                                        //`shipping_city`, `shipping_area`, `shipping_pin_code`, `shipping_message`, `shipping_mobile`, `shipping_email` SELECT * FROM `web_prd_customer_order` WHERE 1
                                        -->
                                        <input type="email" name="shipping_email" value="<?php echo $user_details['email'];?>" placeholder="Email *" required>
                                        <input type="number" name="shipping_mobile" value="<?php echo $user_details['mobile_no'];?>" placeholder="Mobile Number *" required>
                                        <div>
                                            <marquee behavior="" direction=""><h5 class="title text-danger"><b> AT THIS MOVEMENT WE ARE DELIVERY ONLY THIS PINCODE 700027</b></h5></marquee>
                                        </div>
                                        <div class="building-info-wrap">
                                            <h5 class="checkout-form-top">Shipping Information</h5>
  
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" name="shipping_name" value="<?php echo $user_details['name'];?>" placeholder="Name *" required>
                                                </div>
                                            </div>                                           
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="shipping_city" value="<?php echo $user_details['city'];?>" placeholder="Town City" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="shipping_street"  value="<?php echo $user_details['street'];?>" placeholder="Street Address *" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="shipping_pin_code" required>
                                                        <option value="">Select Pincode</option>
                                                        <option value="700027">700027</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="shipping_area"  value="<?php echo $user_details['area'];?>"  placeholder="Area *" required>
                                                </div>
                                            </div>
                                            <textarea name="shipping_message"  placeholder="Order You Have Notes ( Optional )"></textarea>
                                        </div>
                                
                                </div>
                            </div>






                            <div class="col-lg-5">
                                <div class="shop-cart-total order-summary-wrap">
                                    <h3 class="title">Order Summary</h3>
                                    <?php
                                    $sub_total=0;
                                    //`user_id`, `name`, `street`, `city`, `country`, `postcode`, `mobile_no`, `user_name`, `password`SELECT * FROM `users` WHERE 1

                                    //`cart_id`, `user_id`, `prod_id`, `unit_price`, `qty`, `color`SELECT * FROM `cart_details` WHERE 1

                                    $sql3="SELECT * FROM cart_details WHERE user_id IN (select user_id from users where email='$session_user_name') order by cart_id";
                                    $query3=mysqli_query($conn,$sql3);
                                    $num=mysqli_num_rows($query3);
                                    if($num>0)
                                    
                                    {
                                        while($prd=mysqli_fetch_array($query3))
                                        {
                                        $cart_id1=$prd['cart_id'];
                                        $prod_id1=$prd['prod_id'];
                                        $unit_price1=$prd['unit_price'];
                                        $qty1=$prd['qty'];
                                        $prod_total=number_format($unit_price1*$qty1,2);

                                    
                                            $query4=mysqli_query($conn,"select * from web_prd_manage_product_details where prod_id=$prod_id1");
                                    
                                            if($f=mysqli_fetch_array($query4))
                                            {
                                                $brand_id=$f['brand_id'];
                                                $query5=mysqli_query($conn,"select * from web_prd_manage_brand where brand_id=$brand_id");
                                                if($f_brand=mysqli_fetch_array($query5))

                                                {
                                    ?>
                                    <div class="os-products-item">
                                        <div class="thumb">
                                            <a><img src="img/product/<?php echo $f['prod_img_1'];?>" alt=""></a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a ><?php echo $f['prod_name'];?></a></h6>
                                            <span>Brand : </span><?php echo $f_brand['brand_name'];?></span>

                                            <span class="price">₹ <?php echo $unit_price1;?> X <?php echo $qty1;?> =   <?php echo  $prod_total;?></span>
                                            <?php $sub_total=$sub_total*1+$unit_price1*$qty1;?>
                                        </div>
                                        <!--
                                        <form action="" method="post">
                                            <input type="hidden" name="cart_id" value="<?php echo $cart_id1;?>">
                                            <button type="submit" name="remove_cart" class="text-danger"style="background:transparent;border: none;"><i class="fas fa-trash fa-lg"></i></button>
                                        </form>
                                        -->
                                    </div>

                                    <?php 
                                                }

                                            }
                                        }
                                    ?>  

                                    <div class="shop-cart-widget">
                                        <marquee behavior="" direction="">
                                          <h6 class="text-danger text-uppercase">This Order will be deliveried within one day.</h6>  
                                        </marquee>
                                        
                                    
                                            <ul>
                                                <li class="sub-total"><span>Subtotal</span> ₹ <?php echo number_format($sub_total,2);?></li>
                                                <?php $total= number_format($sub_total*1+00,2);?>
                                                <li>
                                                    <span>Shipping</span>
                                              
                                                    <div class="shop-check-wrap">
                                                        <div class="custom-control custom-checkbox">
                                                        
                                                            <label class="custom-control-label-text"> ₹ 00.00</label>
                                                        </div>

                                                    </div>
                                                </li>
                                                <li class="cart-total-amount"><span>Total Price</span> <span class="amount"> ₹ <?php echo $total;?></span></li>

                                                <?php
                                                
                                                //`order_id`, `user_id`, `transaction_id`, `transaction_ref_no`, `booking_date`, `amount`, `transaction_status`, `shipping_name`, `shipping_street`, 
                                                //`shipping_city`, `shipping_area`, `shipping_pin_code`, `shipping_message`, `shipping_mobile`, `shipping_email` SELECT * FROM `web_prd_customer_order` WHERE 1
                                                

                                                //Billing Info Hide
                                                //`user_id`, `name`, `street`, `city`, `country`, `postcode`, `mobile_no`, `user_name`, `password`SELECT * FROM `users` WHERE 1
                                                $user_query=mysqli_query($conn,"select * from users where email='$session_user_name'");
                                                if($user_fetch=mysqli_fetch_array($user_query)) 
                                                {
                                                $user_id=$user_fetch['user_id'];
                                                $pay_amount=$sub_total*1+00;
                                                $book_date=date("dmY");
                                                $book_time=date("his");
                                                $transaction_ref_no="M".$user_id."B".$pay_amount."-".$book_date. $book_time ;
                                                }
                                                ?>
                                                <input type="hidden" name="user_id" value="<?php echo $user_id;?>" class="form-control">
                                                <input type="hidden" name="transaction_id" value="" class="form-control"> 
                                                <input type="hidden" name="transaction_ref_no" value="<?php echo $transaction_ref_no; ?>" class="form-control"> 
                                                <input type="hidden" name="amount" value="<?php echo $total;?>" class="form-control">

                                                
                                            </ul>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <select class="form-control" name="payment_method" required>
                                                        <option value="">Choose payment method</option>
                                                        <option value="Cash on Delivery">Cash on Delivery</option>
                                                        <!--<option value="Google Pay">Google Pay</option>-->
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="payment-terms">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="terms_conditions" name="terms_conditions" value="1" required>
                                                    <label class="custom-control-label" for="terms_conditions">I agree to the website <a href="">Terms and Conditions</a></label>
                                                </div>
                                            </div>


                                            <button type="submit" name="pay_now" class="btn">Pay Now</button>
                                            
                                    
                                    </div>

                                    <?php
                                    }
                                    else
                                    { ?>
                                    <div class="row d-flex justify-content-center h-100 ">
                                            <div class="col-lg-12 py-5">
                                                <div class="text-center">
                                                    <img src="img/icon/emptycart.png" width="150px" alt="">
                                                </div>                            
                                            </div>
                                            <div class="col-lg-12 py-5 bg-white" >
                                                <h1 class="text-center" style="font-family:arial;">Your Cart is <span style="color:red;">Empty!</span> </h1>
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
                            </div>



                        </div>
                    </form>  

        <?php
		}
		?>

                </div>
            </div>
            <!-- checkout-area-end -->

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
