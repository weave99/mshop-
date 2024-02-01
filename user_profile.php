<?php
include_once("includes/conn.php");
require_once("includes/user_sequre_page.php");

//		//`user_id`, `name`, `profile_img`, `gender`, `area`, `street`, `city`, `pin_code`, `mobile_no`, `email`, `verify_otp`, `login_time` SELECT * FROM `users` WHERE 1
if(isset($_POST['update']))
{
	
	$user_id=trim($_POST['user_id']);
	$name= $_POST['name'] ;
	$gender= $_POST['gender'] ;
	$area= $_POST['area'] ;
	$street= $_POST['street'] ;
	$city= $_POST['city'] ;
	$pin_code= $_POST['pin_code'] ;


	$user_sql="SELECT * FROM users WHERE email='$session_user_name'";
	$user_query=mysqli_query($conn,$user_sql);
	if($user_details=mysqli_fetch_array($user_query)) 
	{
		$profile_img_old=$user_details['profile_img'];
	}

	if(!empty($_FILES['profile_img']['name'])){
		$errors= array();
		$profile_img=$_FILES['profile_img']['name'];
		$profile_img_temp=$_FILES['profile_img']['tmp_name'];
		if(empty($errors)==true){
			unlink("img/users_profile_images/".$profile_img_old);
			move_uploaded_file($profile_img_temp,"img/users_profile_images/".$profile_img);
			$update1=mysqli_query($conn,"update  users  set profile_img='$profile_img' where user_id='$user_id'");
		}
	}


	$update=mysqli_query($conn,"update  users  set name='$name', gender='$gender', area='$area', street='$street', city='$city', pin_code='$pin_code' where user_id='$user_id'");


	

	if($update){
    
      header("Location:user_profile.php?msg=Successfully Updated");
    
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }

}	
?>
<!DOCTYPE html>
<html lang="en">

	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MONDAL BHANDER | PROFILE</title>
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

		<?php
		//`user_id`, `name`, `profile_img`, `gender`, `area`, `street`, `city`, `pin_code`, `mobile_no`, `email`, `verify_otp`, `login_time` SELECT * FROM `users` WHERE 1
		$user_sql="SELECT * FROM users WHERE email='$session_user_name'";
		$user_query=mysqli_query($conn,$user_sql);
		if($user_details=mysqli_fetch_array($user_query)) 
		{?>	

        <!-- main-area -->
        <main style="background-color:#f1f3f6;">

            <!-- 404-area -->
            <section class="pt-50 pb-50">
                <div class="container">
				<?php
                if (isset($_GET["msg"])) {
                $msg = $_GET["msg"];
                
                echo'
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>'. $msg . '</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
                ?>




					<form action="" method="post" enctype="multipart/form-data" >
						<input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $user_details['user_id'];?>">
						<!--<input type="hidden" class="form-control" name="profile_img" id="profile_img" value="<?php echo $user_details['profile_img'];?>">-->
							<div class="row">
								<div class="col-lg-3 bg-white pt-3" >
									<div class="text-center">
										<?php
										if($user_details['profile_img']!="")
											{?>
												<img src="img/users_profile_images/<?php echo $user_details['profile_img'];?>" style="width:140px;height:140px; border-radius:50%;"/>
											<?php 
											}
											else { ?>
													<img src="img/images/user.png" width="100px" alt="">
												<?php
											}
											?>
										

										<div class="image-input text-center">
											<input type="file" name="profile_img" accept="image/*" id="imageInput">
											<label for="imageInput" class="image-button"><i class="fa-solid fa-cloud-arrow-up"></i></label>
											<img src="" class="image-preview">
											<span class="change-image">Choose different image</span>
										</div>
									</div>
									<div class="text-center">
										<p>Hello,</p>

									
										<h5><?php echo $user_details['name'];?></h5>

										<p><i class="fa-solid fa-envelope"></i>  <?php echo $user_details['email'];?></p>
										<p><i class="fa-solid fa-phone-volume"></i>  <?php echo $user_details['mobile_no'];?></p>

									</div>			
								</div>


							
								<div class="col-lg-6 bg-white pt-3 pb-3">		
									
									<div class="row">
										<div class="col-lg-6">
											<div class="row">
												<div class="col-lg-12">
													<h4 class="">Personal Information</h4>
												</div>
												
											</div>	
											<div class="row pb-3" >										
												<div class="col-lg-12">
													<label for="">Name</label>
													<input type="text" id="name"  name="name" class="form-control" value="<?php echo $user_details['name'];?>">
													
												</div>												
											</div>
										</div>

										<div class="col-lg-6">
											<div class="row">
												<h4 class="">&nbsp;</h4>
											</div>	
											<div class="row">
												<div class="col-lg-12">
													
													<div class="from-group pt-2">
													<label for="">Your Gender</label>
													<div>
														<input type="radio" name="gender" value="Male" <?php if ($user_details['gender'] == "Male") echo "checked"; ?>>
														<label for="Male">Male</label>&nbsp;&nbsp;&nbsp;
														<input type="radio" name="gender" value="Female" <?php if ($user_details['gender'] == "Female") echo "checked"; ?> >
														<label for="Female">Female</label>																
													</div>
								
													</div>
												</div>
											</div>

										</div>
									</div>					
									
									<div class="row">
										<div class="col-lg-12">
											<h4 class="">Manage Addresses</h4>	
										</div>
									</div>
										
											
									<div class="row">	
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" id="area"  name="area" class="form-control" value="<?php echo $user_details['area'];?>" placeholder="Enter your area...">

											</div>
											<div class="form-group">
												<input type="text" id="street"  name="street" class="form-control" value="<?php echo $user_details['street'];?>" placeholder="Enter your street...">

											</div>
											
											

												

										</div>	
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" id="city"  name="city" class="form-control" value="<?php echo $user_details['city'];?>" placeholder="Enter your city...">
												
											</div>	
											<div class="form-group">
												
												<input type="text" id="pin_code"  name="pin_code" class="form-control" value="<?php echo $user_details['pin_code'];?>" placeholder="Enter your pincode...">
											</div>	
										</div>	
										<div class="col-lg-12 pt-2">
											<button type="submit" name="update" class="btn btn-primary" style="width:100%;">Update</button>
										</div>							

									</div >
											
										</form>	

						
								</div>

								<div class="col-lg-3 bg-white pt-3">
								
										<h4 class="px-2 py-2 mb-1" style="border-bottom: 2px solid  var(--color-primary);">Account Settings</h4>

										<a href="user_orders.php?user_id=<?php echo $user_details['user_id'];?>">
											<h5 class="px-2 py-2 mb-1"><i class="bi bi-box2-fill" style="color:var(--color-primary);"></i>&nbsp;&nbsp; My Orders</h5>
										</a>
										<a href="myreview.php?user_id=<?php echo $user_details['user_id'];?>">
											<h5 class="px-2 py-2 mb-1"><i class="bi bi-star-half" style="color:var(--color-primary);"></i>&nbsp;&nbsp; My Reviews & Ratings</h5>
										</a>

										
										<a href="user_logout.php">
											<h5 class="px-2 py-2 mb-1"><i class="fa-solid fa-power-off" style="color:var(--color-primary);"></i>&nbsp;&nbsp; Logout</h5>
										</a>
										
		
														
								</div>
							


							</div>
					</form>
                </div>
            </section>
            <!-- 404-area-end -->

        </main>
        <!-- main-area-end -->

		<?php
		}
		?>


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
		<script>
        function displayRadioValue() {
            var ele = document.getElementsByName('gender');
 
            for (i = 0; i < ele.length; i++) {
                if (ele[i].checked)
                    document.getElementById("result").innerHTML
                        = "Gender: " + ele[i].value;
            }
        }
    </script>


	<script>

		$("#imageInput").on("change", function () {
			$input = $(this);
			if ($input.val().length > 0) {
				fileReader = new FileReader();
				fileReader.onload = function (data) {
					$(".image-preview").attr("src", data.target.result);
				};
				fileReader.readAsDataURL($input.prop("files")[0]);
				$(".image-button").css("display", "none");
				$(".image-preview").css("display", "block");
				$(".change-image").css("display", "block");
			}
		});

		$(".change-image").on("click", function () {
			$control = $(this);
			$("#imageInput").val("");
			$preview = $(".image-preview");
			$preview.attr("src", "");
			$preview.css("display", "none");
			$control.css("display", "none");
			$(".image-button").css("display", "block");
		});

	</script>
    </body>
</html>