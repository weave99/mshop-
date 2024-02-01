<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Order Successful</title>
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
        *{
            margin: 0;
            padding: 0;
            background-color: #F8CB46;
        }
        .box{
            width:90%;
            height: 70vh;
            position:absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }

        

        </style>
    </head>

<body>

        <div class="box">
           
            <div class="img_box">
                <dotlottie-player src="https://lottie.host/dc771cff-868b-43d4-a9b8-353996b2a2ad/GjeXICFK3M.json" background="transparent" speed="1" style=" width: 100%; height: 400px; position:relative; left:50%; transform:translate(-50%, 0%);"  autoplay></dotlottie-player>
            </div>
                        
            <div class="text-center">
                <h4>Order Placed</h4>
                <h5>Thanks for shopping with us!</h5>
                <h5>Delivery by <?php echo $_REQUEST['delivery_date'];;?></h5> Thu, Dec 14th 23
                <a href="user_orders.php">
                    <button class="btn mt-3">View order</button>
                </a>
                <a href="index.php">
                    <button class="btn mt-3">Continue shopping</button>
                </a>
            </div>
 
        </div>  





        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

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