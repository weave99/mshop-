<?php
include_once("includes/conn.php");

// Add Php Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
// Add Php Mailer


if(isset($_POST['send']))
{
	$email = $_REQUEST['email'];
    $verify_otp = $_POST['verify_otp'];
    //`user_id`, `name`, `profile_img`, `gender`, `address`, `mobile_no`, `email`, `verify_otp`, `exp_date`, `login_time` SELECT * FROM `users` WHERE 1


		$checkVerifyQuery = "SELECT * FROM users WHERE email = '$email'";

        $result = $conn->query($checkVerifyQuery);
        if ($result->num_rows > 0) {
            $sql="SELECT * FROM users WHERE verify_otp='$verify_otp'";
            $query=mysqli_query($conn,$sql);
            if($r=mysqli_fetch_array($query))
            {
				mysqli_query($conn,"UPDATE users set verify_otp='" . NULL . "' where email='$email'");

                session_start();
                $_SESSION['user_name']=$email;
                header("location:index.php");
            }
            else{
					header("location:user_verify_otp.php?email=".$email."&msg=Invalide OTP");
                }
        } 
        else {
			echo '<script>alert("Email No Did not Match ! Please check your email")</script>';
        }
}
?>

<!doctype html>
	<html lang="en">


	<head>
		<title>MONDAL BHANDER | VERIFY OTP</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--favicon-->
		<link rel="icon" href="img/logo/favicon.png" type="image/png" />
		<!--plugins-->
		<link href="admin/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
		<link href="admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
		<link href="admin/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
		<!-- loader-->
		<link href="admin/assets/css/pace.min.css" rel="stylesheet" />
		<script src="admin/assets/js/pace.min.js"></script>
		<!-- Bootstrap CSS -->
		<link href="admin/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="admin/assets/css/bootstrap-extended.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
		<link href="admin/assets/css/app.css" rel="stylesheet">
		<link href="admin/assets/css/icons.css" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		<style>
	#website_user_login_logo{
		width: 60%;
	}
	@media (max-width: 440px) {

		#website_user_login_logo{
			width: 100%;
		}
	}

	</style>
	</head>

<body style="background-image:url(img/bg/bg.jpg); background-size:cover; background-position:center;">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0 ">
			<div class="container mt-5 mb-5">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 mb-5 mt-5 pb-1">
					<div class="col mx-auto">
						<div class="card mb-5 mt-4">
							<div class="card-body">
								<div class="p-1">
									<div class="mb-3 text-center">
										<img src="img/logo/logo_2.png" id="website_user_login_logo" alt="" />
									</div>
									<div class="text-center mb-2">
										<p class="mb-0">OTP code has been send to your email id</p>
										<p class="text-danger"><b><?php if (isset($_REQUEST["msg"])) {$msg = $_REQUEST["msg"];echo $msg ;}?></b></p>
									</div>
									<!--`user_id`, `name`, `profile_img`, `gender`, `address`, `email`, `mobile_no`, `verify_otp`, `exp_time`, `login_time` SELECT * FROM `users` WHERE 1-->
									<div class="form-body">
										<form action="" method="POST" class="row g-3">

											<div class="col-12">
												<label for="otp" class="form-label">Enter OTP <span class="text-danger">*</span></label>
												<input type="number" class="form-control" name="verify_otp"  placeholder="Type here..." required>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="send" class="btn btn-primary">Verify</button>
												</div>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="admin/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="admin/assets/js/jquery.min.js"></script>
	<script src="admin/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="admin/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="admin/assets/js/app.js"></script>
</body>


</html>


