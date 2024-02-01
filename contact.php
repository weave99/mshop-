<?php
include_once("includes/conn.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
if(isset($_POST["send"])){
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'mondalbhander.shop@gmail.com';
  $mail->Password = 'ntwtfljcoenfhyse';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  $mail->setFrom('mondalbhander.shop@gmail.com','Enquery Form Website');
  $mail->addAddress('mondalbhander.shop@gmail.com');
  $mail->addAddress('mondalbhander.shop@gmail.com');
  $mail->isHTML(true);
  $mail->Subject = $_POST["subject"];
  $mail->Body = "<b>Name :</b> ".$_POST["name"]."<br>".
                "<b>Email :</b> ".$_POST["email"]."<br>".
                "<b>Subject :</b> ".$_POST["subject"]."<br>".
                "<b>Message :</b> ".$_POST["message"];
  if($mail->send()){
    echo "<script>alert('Form submit sucessfully owner will be contact soon...')</script>";
    echo "<script>location.href='contact.php'</script>";
  }
  else{
    echo "<script>alert('Error please try again')</script>";
  }
}
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Contact</title>
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

            <!-- map-area -->
            <div id="map-bg">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.388317130434!2d88.32153007593953!3d22.527121934634454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a027735d298a235%3A0x65bb31f51ca3a183!2sMONDAL%20BHANDER!5e0!3m2!1sen!2sin!4v1685247040083!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- map-area-end -->

            <!-- contact-area -->
            <section class="contact-area pt-90 pb-90">
                <div class="container">
                    <div class="container-inner-wrap">
                        <div class="row justify-content-center justify-content-lg-between">
                            <div class="col-lg-6 col-md-8 order-2 order-lg-0">
                                <div class="contact-title mb-25">
                                    <h5 class="sub-title">Contact Us</h5>
                                    <h2 class="title">If any query, Leave a message<span>.</span></h2>
                                </div>
                                <div class="contact-wrap-content">  
                                    <form action="" method="POST" class="contact-form">
                                        <div class="form-grp">
                                            <label for="name">Your Name <span>*</span></label>
                                            <input type="text" id="name" name="name" placeholder="Jon Deo...">
                                        </div>
                                        <div class="form-grp">
                                            <label for="email">Your Email <span>*</span></label>
                                            <input type="email" id="email" name="email"  placeholder="info.example@.com">
                                        </div>
                                        <div class="form-grp">
                                            <label for="email">Subject <span>*</span></label>
                                            <input type="text" id="subject" name="subject"  placeholder="example...">
                                        </div>
                                        <div class="form-grp">
                                            <label for="message">Your Message <span>*</span></label>
                                            <textarea name="message" id="message" name="message" placeholder="Opinion..."></textarea>
                                        </div>
                                        <button type="submit" name="send" class="btn rounded-btn">Send Now</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 col-md-8">
                                <div class="contact-info-wrap">
                                    <div class="contact-img">
                                        <img src="img/images/contact_img.png" alt="">
                                    </div>
                                    <div class="contact-info-list">
                                        <ul>
                                            <li>
                                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                                <div class="content">
                                                    <p>B/15/H Braunfield Raw, Mominpore, Kolkata, West Bengal 700027</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><i class="fas fa-phone"></i></div>
                                                <div class="content">
                                                    <p>+91 3335943426</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><i class="fas fa-envelope-open"></i></div>
                                                <div class="content">
                                                    <p>mondalbhander.shop@gmail.com</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="contact-social">
                                        <ul>
                                            <li><a href="https://www.facebook.com/people/MS-Mondal-Bhander/100069624900838/?paipv=0&eav=AfYeonNsOLtvGnl5WXYzvv-4VY2pay0dhKt4aekFFgJaBj9WFSkYB9mBm_JRK_aUY4U&_rdr"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

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

<!-- Mirrored from themebeyond.com/pre/ganic-prev/ganic-live/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 18:13:53 GMT -->
</html>
