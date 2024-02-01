<?php
include_once("includes/conn.php");


//Add php mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
//Add php mailer




if(isset($_POST['login']))
{
	//`user_id`, `name`, `profile_img`, `gender`, `address`, `mobile_no`, `email`, `verify_otp`, `logout_time`, `login_time`SELECT * FROM `users` WHERE 1

	$email= $_POST['email'] ;
    $genarate_otp= random_int(100000, 999999);

    // Validate input (you can add more validation as per your requirements)
    if (empty($email)) {
        echo "Please fill in the fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid Mobile No format.";
    } 
    else {
        // Check if the email is already registered
		$checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($checkEmailQuery);

		
        if ($result->num_rows > 0) {
			$query=mysqli_query($conn,"UPDATE users set verify_otp='" . $genarate_otp . "' WHERE email = '$email'");
			
			if($query){

                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'mondalbhander.shop@gmail.com';
                $mail->Password = 'ntwtfljcoenfhyse';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
              
                $mail->setFrom($email,'Mondalbhander.store');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = "Mondalbhander.store Send a OTP Code" ;
                $mail->Body = '

				<div>
					<div>
						<div style="font-family: Arial, Helvetica, sans-serif;">
							<div style="background-color:#fff;margin-top: 20px ;">
								<div>
									<div style="text-align:center;padding-top: 30px;">
										<img src="cid:logo" width="300px" alt="">
									</div>
								</div>
								
								<div>
									<div class="p-3" style="padding: 30px;">
										<div class="text-left mb-3" style="border-top: 5px solid #005400;color:#fff; background-color: #66ad09;">
											<div style="padding: 30px;">
												<!--//////--BODY--//////////-->
												<h4>To authenticate, please use the following One Time Password (OTP):</h4>
			
												<h5 style="font-family: Arial, Helvetica, sans-serif;text-align: center;"><b>One Time Password</b></h5>
												<h1 style="text-align: center;">' .$genarate_otp. '</h1>
												<h5 style="text-align: center">(This code is valid for 10 minutes)</h5>
			
												<h5>
													Do not share this OTP with anyone. Our customer service team will never ask you for your password, OTP, credit card, or banking info.
												</h5>
												<h5>
													We hope to see you again soon.
												</h5>
												<!--//////--BODY--//////////-->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>    
				</div>
				
				
				
				';
				
				
				// Attach the image
				$imagePath = 'img/logo/logo_2.png'; //path/to/your/image.jpg // Replace with your image file path
				$mail->addEmbeddedImage($imagePath, 'logo'); //cid:logo
              
              
                if($mail->send()){
                    header("Location:user_verify_otp.php?email=".$email);

                }
                else{
                  echo "<script>alert('Error please try again')</script>";
                }
            }
			else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }
			
        }   
        else {
			header("location:user_login.php?msg=Email Id Not Registered");
        } 

    }  
}
?>
<!doctype html>
<html lang="en">


<head>
	<title>MONDAL BHANDER | LOGIN</title>
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
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 mb-5 mt-5">
					<div class="col mx-auto">
						<div class="card">
							<div class="card-body">
								<div class="p-1">
									<div class="mb-3 text-center">
										<img src="img/logo/logo_2.png" id="website_user_login_logo" alt="" />
									</div>
									<div class="text-center mb-2">
										<p class="mb-0">Please log in to your account</p>
										<p class="text-danger"><b><?php if (isset($_REQUEST["msg"])) {$msg = $_REQUEST["msg"];echo $msg ;}?></b></p>
									</div>
									<div class="form-body">
										<form action="" method="POST" class="row g-3">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email</label>.</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
											</div>
											<!--
											<div class="col-md-12 text-end">	
												<a href="user_forgot_password.php">Forgot Password ?</a>
											</div>
											-->
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="login" class="btn btn-primary">Login</button>
												</div>
											</div>
											<div class="col-12">
												<div class="text-center ">
													<p class="mb-0">Don't have an account yet? <a href="user_register.php">Sign up here</a>
													</p>
												</div>
											</div>
										</form>
									</div>
									<div class="login-separater text-center"> <span><b class="text-danger"><?php if(isset($_REQUEST['err'])){echo $_REQUEST['err'];}?></b></span>


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