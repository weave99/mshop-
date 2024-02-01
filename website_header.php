		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header>

            <!-- header-message -->
            <div class="header-message-wrap">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="top-notify-message">
                                <marquee behavior="" direction=""><p> This site under maintenance right now. Booking options available only cash on delivery !</p></marquee>
                                <!--<p>place your complaints (if any) within 24hrs of receiving your delivery</p>-->
                                <span class="message-remove">X</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-message-end -->

            <!-- header-top-start -->
            <div class="header-top-wrap">
                <div class="container custom-container">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="header-top-left">
                                <ul>
                                    <li class="header-work-time">
                                        Opening time: <span> Mon - Sun : 7:00 AM - 11:00 PM</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-top-right">
                                <ul>
                                    <li><a href="https://www.facebook.com/people/MS-Mondal-Bhander/100069624900838/?paipv=0&eav=AfYeonNsOLtvGnl5WXYzvv-4VY2pay0dhKt4aekFFgJaBj9WFSkYB9mBm_JRK_aUY4U&_rdr"><i class="bi bi-facebook" style="font-size: 18px;"></i></a></li>
                                    <li><a href="https://wa.me/9830518789"><i class="bi bi-whatsapp" style="font-size: 18px;"></i></a></li>
                                    <li><a href=""><i class="bi bi-instagram" style="font-size: 18px;"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-top-end -->

            <!-- header-search-area -->
            <div class="header-search-area">
                <div class="container custom-container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="logo">
                                <a href="index.html"><img src="img/logo/logo.png" width="100%" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="d-block d-sm-flex align-items-center justify-content-end">
                                <div class="header-search-wrap">

                                    <form action="search_result.php" method="POST">
                                        <input  name="search_data" id="search_data"  placeholder="Search Product..." required />
                                        

                                        <button type="submit" name="search_product"><i class="flaticon-loupe-1"></i></button>
                                    </form>

                                </div>
                                <div class="header-action">
                                    <ul>
                                        <li class="header-phone">
                                            <div class="icon"><i class="flaticon-telephone"></i></div>
                                            <a href="tel:+91 3335943426"><span><b> Call Us Now</b></span>+91 3335943426</a>
                                        </li>
                                     <!--=========================Login System=========================================-->
                                        <li class="header-wishlist">
                                            <a href="wistlist_details.php"><i class="flaticon-heart-shape-outline"></i></a>
                                            <span class="item-count">
                                            
                                            <?php
                                             if(isset($_SESSION['user_name'])){  
                                                $h_u=$_SESSION['user_name'];
                                                $sql0="SELECT * FROM wishlist WHERE user_id IN (select user_id from users where email='$h_u')";
                                                $query0=mysqli_query($conn,$sql0);
                                                $num=mysqli_num_rows($query0);
                                                echo $num;
                                                }
                                                else echo "0";
                                            ?>
                                            </span>
                                        </li>

                                        <li class="header-cart-action">
                                            <div class="header-cart-wrap">
                                                <a href="cart_details.php"><i class="flaticon-shopping-basket"></i></a>
                                                <span class="item-count">
                                                <?php
                                                 if(isset($_SESSION['user_name'])){  
                                                        $h_u=$_SESSION['user_name'];
                                                        $sql0="SELECT * FROM cart_details WHERE user_id IN (select user_id from users where email='$h_u')";
                                                        $query0=mysqli_query($conn,$sql0);
                                                        $num=mysqli_num_rows($query0);
                                                        echo $num;
                                                        }
                                                        else echo "0";
                                                        
                                                ?>
                                                </span>
                                            </div>
                                            <!--<div class="cart-amount">$0.00</div>-->
                                        </li>

                                        <?php 
                                        
                                        
                                        if(!isset($_SESSION['user_name']))                                    
                                        {  

                                        ?>
                                        <li class="header-login-register">
                                            <a href="user_login.php">Login</a>
                                        </li>
                                        
                                        <li class="header-login-register">
                                            <a href="user_register.php">Register</a>
                                        </li>
                                        <?php } else { ?>
                                            <li class="header-user">
                                            <div class="dropdown">
                                                <button class="dropbtn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $_SESSION['user_name']; ?>"><i class="flaticon-user"></i></button>
                                                <div class="dropdown-content">
                                                                               
                 
                                                    <a href="user_profile.php"><i class="bi bi-person-circle" style="color:var(--color-primary);"></i>&nbsp;&nbsp; My Profile</a>
                                                    <a href="user_orders.php"><i class="bi bi-box2-fill" style="color:var(--color-primary);"></i>&nbsp;&nbsp;  Orders</a>
                                                    <a href="user_logout.php"><i class="fa-solid fa-power-off" style="color:var(--color-primary);"></i>&nbsp;&nbsp; Logout</a>
                                              
                                                </div>
                                            </div>
                                            </li>
                                        <?php } ?>

                                    <!--============================Login System======================================-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-search-area-end -->

            <div id="sticky-header" class="menu-area">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav">
                                    <div class="logo d-block d-lg-none">
                                        <a href="index.html"><img class="pt-1" src="img/logo/logo.png" width="98%" alt=""></a>
                                    </div>
                                    <div class="header-category d-none d-lg-block">
                                        <a href="#" class="cat-toggle"><i class="fas fa-bars"></i>ALL DEPARTMENT<i class="fas fa-angle-down"></i></a>
                                        <ul class="category-menu">
                                            <li class="menu-item-has-children"><a href=""><i class="flaticon-groceries"></i>Oil</a>
                                                <ul class="megamenu">
                                                    <li class="sub-column-item"><a href="products.php">Oil 1</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="products.php">Oil 2</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="products.php">Oil 3</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="products.php">Oil 4</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="products.php">Oil 5</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="products.php">Oil 6</a>
                                                        <ul>
                                                            <li class="mega-menu-banner"><a href="products.php"><img src="img/images/megamenu_banner.jpg" alt=""></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href=""><i class="flaticon-hazelnut"></i>Rice</a>
                                                <ul class="megamenu">
                                                    <li class="sub-column-item"><a href="">Rice 1</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="">Rice 2</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="">Rice 3</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="">Rice 4</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="">Rice 5</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="">Rice 6</a>
                                                        <ul>
                                                            <li class="mega-menu-banner"><a href=""><img src="img/images/megamenu_banner02.jpg" alt=""></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href=""><i class="flaticon-cupcake"></i> Biscuits</a>
                                                <ul class="megamenu">
                                                    <li class="sub-column-item"><a href=""> Biscuits 1</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="">Biscuits 2</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="">Biscuits 3</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="">Biscuits 4</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="">Biscuits 5</a>
                                                        <ul>
                                                            <li><a href="">Product 1</a></li>
                                                            <li><a href="">Product 2</a></li>
                                                            <li><a href="">Product 3</a></li>
                                                            <li><a href="">Product 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="">Biscuits 6</a>
                                                        <ul>
                                                            <li class="mega-menu-banner"><a href=""><img src="img/images/megamenu_banner.jpg" alt=""></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href=""><i class="flaticon-broccoli"></i> Dry Food</a></li>
                                            <li><a href=""><i class="flaticon-pop-corn-1"></i> Popcorn</a></li>
                                            <li><a href=""><i class="flaticon-nut"></i> Dried Fruit</a></li>
                                        </ul>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class=""><a href="index.php">HOME</a></li>
                                            <li><a href="product_deals_offer.php">DEALS</a></li>
                                            <li><a href="search_category.php?category_name=GROCERY">GROCERY</a></li>
                                            <li><a href="search_category.php?category_name=STATIONERY">STATIONERY</a></li>
                                            <li><a href="search_category.php?category_name=COLDRINKS">COLDRINKS</a></li>
                                            <li><a href="search_category.php?category_name=ICE CREAM">ICE CREAM</a></li>
                                            <li><a href="about.php">ABOUT US</a></li>
                                            <!--
                                            <li class="menu-item-has-children"><a href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="shop-details.html">Shop Details</a></li>
                                                    <li><a href="cart.html">cart Page</a></li>
                                                    <li><a href="checkout.html">Checkout page</a></li>
                                                    <li><a href="blog.html">Our Blog</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                    <li><a href="404.html">404 Page</a></li>
                                                    <li><a href="terms-conditios.html">Terms Conditions</a></li>
                                                </ul>
                                            </li>
                                            -->
                                            <li><a href="contact.php">CONTACT US</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <nav class="menu-box">
                                    <div class="close-btn"><i class="fas fa-times"></i></div>
                                    <div class="nav-logo"><a href="index.html"><img src="img/logo/logo.png" width="100%" alt="" title=""></a>
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix">
                                            <li><a href="https://www.facebook.com/people/MS-Mondal-Bhander/100069624900838/?paipv=0&eav=AfYeonNsOLtvGnl5WXYzvv-4VY2pay0dhKt4aekFFgJaBj9WFSkYB9mBm_JRK_aUY4U&_rdr"><span class="fab fa-facebook-f"></span></a></li>
                                            <li><a href="https://wa.me/9830518789"><i class="bi bi-whatsapp" style="font-size: 18px;"></i></a></li>
                                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu-backdrop"></div>
                            <!-- End Mobile Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area-end -->

        <!-- Tooltip -->
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
                })
        </script>