<?php
include_once("includes/conn.php");
require_once("includes/user_sequre_page.php");          
     //`order_id`, `user_id`, `transaction_id`, `transaction_ref_no`, `booking_date`, `amount`, `transaction_status`, `shipping_name`, `shipping_street`, 
     //`shipping_city`, `shipping_area`, `shipping_pin_code`, `shipping_message`, `shipping_mobile`, `shipping_email` SELECT * FROM `web_prd_customer_order` WHERE 1
     if(isset($_POST['pay_now']))
     {
        $order_user_id=$_POST['user_id'];
        $order_transaction_id=$_POST['transaction_id'];
        $order_transaction_ref_no=$_POST['transaction_ref_no'];
        $order_booking_date=date("d-m-Y");
        $order_amount=$_POST['amount'];
        $order_transaction_status="PENDING";
        $order_shipping_name=$_POST['shipping_name'];
        $order_shipping_street=$_POST['shipping_street'];
        $order_shipping_city=$_POST['shipping_city'];
        $order_shipping_area=$_POST['shipping_area'];
        $order_shipping_pin_code=$_POST['shipping_pin_code'];
        $order_shipping_message=$_POST['shipping_message'];
        $order_shipping_mobile=$_POST['shipping_mobile'];
        $order_shipping_email=$_POST['shipping_email'];
        $order_terms_conditions=$_POST['terms_conditions'];
        $order_payment_method=$_POST['payment_method'];
        // Sending Payment Response page //
        if($order_payment_method=="Cash on Delivery"){
            $payment_method_link="cod_response.php";         
        }
        else if($order_payment_method=="Google Pay"){
            $payment_method_link="gpay_response.php";         
        }
        

        $sql="INSERT INTO web_prd_customer_order (user_id, transaction_id, transaction_ref_no, booking_date, amount, transaction_status, payment_method, shipping_name, shipping_street, shipping_city, shipping_area, shipping_pin_code, shipping_message, shipping_mobile, shipping_email, terms_conditions)
        VALUES ('$order_user_id','$order_transaction_id','$order_transaction_ref_no','$order_booking_date','$order_amount','$order_transaction_status', '$order_payment_method','$order_shipping_name','$order_shipping_street','$order_shipping_city','$order_shipping_area','$order_shipping_pin_code','$order_shipping_message','$order_shipping_mobile','$order_shipping_email', terms_conditions='$order_terms_conditions')";
        $query=mysqli_query($conn,$sql);
        if($query){
            header("Location: $payment_method_link"); // Send response page
        }
        else{
            echo "Failed: " . mysqli_error($conn);
        }
    }     
 ?>    
