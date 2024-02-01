<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Create a PHPMailer instance
$mail = new PHPMailer(true);

try {
    // SMTP configuration for Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'check.formsubmission@gmail.com';
    $mail->Password = 'mehzqzvfwwggxpzo';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient settings
    $mail->setFrom('check.formsubmission@gmail.com', 'Your Name');
    $mail->addAddress('soumodeepmondal20@gmail.com', 'Recipient Name');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Email with Image';
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
                                    <h1 style="text-align: center;">' .$otp. '</h1>
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

    // Send the email
    $mail->send();
    echo 'Email with image has been sent!';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>


