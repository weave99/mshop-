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



                        <div class="col-lg-12 mt-4 border" style="background-color:#f6f7f9;">
                            <div class="row p-2">
                                <form action="" method="post">
                                    <h5>Reason For Cancellation</h5>
                                

                                
                                    <div class="form-group">
                                        <input type="radio" name="reason" value="I have changed my mind">
                                        <label for="">I have changed my mind</label>  
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="reason" value="I want to convert my order to Prepaid">
                                        <label for="">I want to convert my order to Prepaid</label>  
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="reason" value="Price for the product has decreased Expected delivery time is very long">
                                        <label for="">Price for the product has decreased Expected delivery time is very long</label>  
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="reason" value="I want to cancel due to product quality issues">
                                        <label for="">I want to cancel due to product quality issues</label>  
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="reason" value="I want to change my phone number">
                                        <label for="">I want to change my phone number</label>  
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="reason" value="I have purchased the product elsewhere">
                                        <label for="">I have purchased the product elsewhere</label>  
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit_request" class="btn btn-primary ">Submit Request</button>
                                    </div>
                                    
                                </form>
                                
                                                                

                            </div>
                        </div>









                </div>
            </section>
           

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