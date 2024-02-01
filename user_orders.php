<?php
include_once("includes/conn.php");
require_once("includes/user_sequre_page.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MONDAL BHANDER | ORDERS</title>
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

            <!-- breadcrumb-area -->
            <div class="breadcrumb-area breadcrumb-bg-two">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item"><a href="user_orders.php">Orders</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->



            <!-- 404-area -->
            <section class="pt-50 pb-50">
                <div class="container">
                    <div class="row">

                            <?php
                            $user_sql="SELECT * FROM users WHERE email='$session_user_name'";
                            $user_query=mysqli_query($conn,$user_sql);
                            if($user_details=mysqli_fetch_array($user_query)){
                            $user_id=$user_details['user_id'];
                            }


                            //`order_id`, `trans_no`, `trans_date`, `amount`, `user_id`, `txn_status`, `clnt_txn_ref`, 
                            // `shipping_mobile`, `shipping_email` SELECT * FROM `customer_order` WHERE 1


                            //`id`, `order_id`, `prod_id`, `unit_price`, `qty`, `model_no` SELECT 
                            //* FROM `customer_order_details` WHERE 1



                            //`prod_id`, `model_no`, `prod_name`, `mrp`, `persent_discount`, `picture_1`,
                            //SELECT * FROM `product_details` WHERE 1


                                $order_sql="SELECT * FROM web_prd_customer_order WHERE user_id='$user_id' order by order_id DESC";
                                $order_query=mysqli_query($conn,$order_sql);
                                $num=mysqli_num_rows($order_query);
                                if($num>0)
                                {
                                    while($order_details=mysqli_fetch_array($order_query)) 
                                    { 
                                    $order_id=$order_details['order_id'];
                                    $transaction_ref_no=$order_details['transaction_ref_no'];
                                    $booking_date=$order_details['booking_date'];
                                    $delivery_date=$order_details['delivery_date'];
                                    $transaction_status=$order_details['transaction_status'];

                                        $sql3="SELECT * FROM web_prd_customer_order_details WHERE order_id='$order_id'";
                                        $query3=mysqli_query($conn,$sql3);
                                        $num=mysqli_num_rows($query3);
                                        if($num>0)
                                        {
                                            $sub_total=0;
                                            while($prd=mysqli_fetch_array($query3)) 
                                            {
                                            $prod_id1=$prd['prod_id'];
                                            $unit_price1=$prd['unit_price'];
                                            $qty1=$prd['qty'];
                                
                                
                                                $query4=mysqli_query($conn,"select * from web_prd_manage_product_details where prod_id=$prod_id1");
                                                if($f=mysqli_fetch_array($query4)) 
                                                {
                                                    $brand_id=$f['brand_id'];
                                                    $query5=mysqli_query($conn,"select * from web_prd_manage_brand where brand_id=$brand_id");
                                                    if($f_brand=mysqli_fetch_array($query5))
    
                                                    {
                                                    $prod_name=$f['prod_name'];
                                                    $prod_img_1=$f['prod_img_1'];
                                ?>



                                                        <div class="col-lg-12 mt-4 border" style="background-color:#f6f7f9;">
                                                            <div class="row p-2">
                                                                
                                                                <div class="col-lg-5 d-flex">
                                                                    <div style="width:120px; height:120px;overflow:hidden;">
                                                                        <img src="img/product/<?php echo $prod_img_1;?>" width="100%" alt="">
                                                                    </div>
                                                                    <div class="pt-5">
                                                                        <h5><?php echo $prod_name; ?></h5>
                                                                        <p>Brand : <?php echo $f_brand['brand_name'];?></p>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <p> Tnx No. : <a href="user_orders_details.php?transaction_ref_no=<?php echo  $transaction_ref_no; ?>"><?php echo  $transaction_ref_no; ?>
                                                                    </a> </p>
                                                                    <p>Unit Price : ₹ <?php echo $unit_price1;?>  &nbsp; Qty : <?php echo $qty1; ?></p>
                                                                    <p>Amount : ₹ <?php echo number_format($unit_price1*$qty1,2);?></p>
                                                                
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <p>Booking Date :  <?php echo $booking_date;?> </p>
                                                                    <p>Delivery Date : <?php echo $delivery_date;?> </p>
                                                                    <p>Status : <?php echo  $transaction_status; ?></p>
                                                                    
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="cancel_btn"><a href="user_orders cancel.php?order_id=<?php echo $order_id;?>"><button class="btn btn-danger" style="background-color: #dc3545;">Cancel</button></a></div>
                                                                </div>
                                                        
                                                            </div>

                                                        </div>







                            <?php
                                                    }
                                                }
                                            }   
                                        }
                                    }
                                
                                }
                                else
                                {
                            ?>

                            <div class="col-lg-12 py-5">
                                <div class="text-center">
                                    <img src="img/icon/emptyorder.png" width="300px" alt="">
                                </div>                            

                                
                            </div>
                            <div class="col-lg-12 py-5 bg-white" >
                                <h1 class="text-center" style="font-family:arial;">Your Order is <span style="color:red;">Empty!</span> </h1>
                                <p  class="text-center">Look like you have not placed an order in last purchase history.</p>

                                <div   class="text-center">
                                    <a href="index.php" class="btn btn-primary">RETURN TO SHOP</a>
                                </div>
                            </div>
     



                            <?php
                                }
                            ?>


                </div>
            </section>
            <!-- 404-area-end -->

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