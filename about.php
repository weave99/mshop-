<?php
include_once("includes/conn.php");
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>About</title>
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
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item" aria-current="page">About us</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb-area-end -->



            <!-- ingredients-area -->
            <section class="ingredients-area pt-90 pb-90">
                <div class="container">
                    <div class="ingredients-inner-wrap">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <div class="ingredients-img">
                                    <img src="img/images/ingredients_img.jpg" alt="">
                                    <div class="active-years">
                                        <h2 class="title">22+ <span>Years</span></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="ingredients-content-wrap">
                                    <div class="ingredients-section-title">
                                        <span class="sub-title">ingredients</span>
                                        <h2 class="title">MONDAL BHANDER</h2>
                                    </div>
                                    <p>Grocery stores are places that sell food for us to eat. Supermarkets have lots of aisles with lots of different foods. Today we are going to learn about some of the foods in the grocery store—where the foods come from before they get to the store and where you can find them once they are in the store.”</p>
                                    <!--
                                    <div class="ingredients-fact">
                                        <ul>
                                            <li>
                                                <div class="icon"><img src="img/icon/ing_icon01.png" alt=""></div>
                                                <div class="content">
                                                    <h4>128+</h4>
                                                    <span>Awards Winner</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><img src="img/icon/ing_icon02.png" alt=""></div>
                                                <div class="content">
                                                    <h4>35k+</h4>
                                                    <span>Active Volunteers</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>-->
                                    <div class="ingredients-btn-wrap">
                                        <a href="product_deals_offer.php" class="btn">Shop now</a>
                                        <a href="contact.php" class="store-link">our Store <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ingredients-area-end -->

            <!-- services-area -->
            <section class="services-area services-bg">
                <div class="container-fluid">
                    <div class="container-inner-wrap">
                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-9">
                                <div class="services-section-title text-center mb-55">
                                    <h2 class="title">What We Provide?</h2>
                                    <p>Need things fresh? Whether it’s fruits and vegetables or dairy and meat, we have this covered as well! Get fresh eggs, meat, fish and more online at your convenience. Hassle-free Home Delivery options</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10">
                                <div class="services-item">
                                    <a href="contact.html" class="services-link"></a>
                                    <div class="icon"><i class="flaticon-groceries-1"></i></div>
                                    <div class="content">
                                        <h5>POPULAR CATEGORIES<!--<span class="new">NEW</span>--></h5>
                                        <p>Sunflower Oils, Wheat Atta, Ghee, Milk, Health Drinks, Flakes, Organic F&V, Namkeen, Eggs, Floor Cleaners, Other Juices, Leafy Vegetables, Frozen Veg Food, Diapers & Wipes,</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10">
                                <div class="services-item">
                                    <a href="contact.html" class="services-link"></a>
                                    <div class="icon"><i class="flaticon-groceries"></i></div>
                                    
                                    <div class="content">
                                        <h5>POPULAR BRANDS</h5>
                                        <p>Amul, Nescafe , MTR, RED BULL , elite cake, Pediasure, Yummiez, Yera, Yakult, Britannia, Wow Momo, Fortune , Haldirams , Ferrero, Lays, Patanjali, McCain, kwality walls, Cadbury Dairy Milk, Pedigree,</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10">
                                <div class="services-item">
                                    <a href="contact.html" class="services-link"></a>
                                    <div class="icon"><i class="flaticon-delivery"></i></div>
                                    <div class="content">
                                        <h5>PLACES WE SERVE</h5>
                                        <p>B/15/H Braunfield Raw</p>
                                        <p>Monminpure</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10">
                                <div class="services-item">
                                    <a href="contact.html" class="services-link"></a>
                                    <div class="icon"><i class="flaticon-approval"></i></div>
                                    <div class="content">
                                        <h5>PAYMENT OPTIONS</h5>
                                        <img src="img/images/payment.png" width="100%" alt="">
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                                <div class="services-item">
                                    <a href="contact.html" class="services-link"></a>
                                    <div class="icon"><i class="flaticon-settings"></i></div>
                                    <div class="content">
                                        <h5>Database Software<span class="new">NEW</span></h5>
                                        <p>Knowledge base that organized collection system</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                                <div class="services-item">
                                    <a href="contact.html" class="services-link"></a>
                                    <div class="icon"><i class="flaticon-online-service"></i></div>
                                    <div class="content">
                                        <h5>Articles</h5>
                                        <p>Knowledge base that organized collection system</p>
                                    </div>
                                </div>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- services-area-emd -->

            <!-- newsletter-area -->
            <!--
            <section class="newsletter-area pt-90 pb-90">
                <div class="container">
                    <div class="container-inner-wrap">
                        <div class="row">
                            <div class="col-12">
                                <div class="newsletter-wrap">
                                    <h2 class="title">Are you ready to get your <span>business grossing</span></h2>
                                    <div class="newsletter-form">
                                        <form action="#">
                                            <input type="email" placeholder="Email address">
                                            <button class="btn">subscribe</button>
                                        </form>
                                    </div>
                                    <img src="img/images/newsletter_shape01.png" alt="" class="newsletter-shape top-shape wow fadeInDownBig" data-wow-delay=".3s">
                                    <img src="img/images/newsletter_shape02.png" alt="" class="newsletter-shape bottom-shape wow fadeInUpBig" data-wow-delay=".3s">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            -->
            <!-- newsletter-area-end -->

            <!-- online-support-area -->
            <!--
            <section class="online-support-area pt-5">
                <div class="container">
                    <div class="container-inner-wrap">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-5">
                                <div class="online-support-img">
                                    <img src="img/images/support_img.png" alt="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="online-support-content">
                                    <h2 class="title">Mondal Bhander Online Support</h2>
                                    <p>Tamin ipsum is simply dummy the prinng and tysetting industry. Lorem ipsum has been the industry's standard dummy that everince prinng
                                    when unknown printer took galley.</p>
                                    <div class="support-info-wrap">
                                        <ul>
                                            <li>
                                                <div class="support-info-item">
                                                    <p>Around the clock support</p>
                                                    <h2><i class="flaticon-24-hour-service"></i> 24/7</h2>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="support-info-item">
                                                    <p>customer happiness rating</p>
                                                    <h2><i class="flaticon-happy-1"></i> 98.9%</h2>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            -->
            <!-- online-support-area-end -->

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

<!-- Mirrored from themebeyond.com/pre/ganic-prev/ganic-live/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 18:13:56 GMT -->
</html>
