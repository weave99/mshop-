<?php
include_once("includes/conn.php");
require_once("includes/user_sequre_page.php");
       

    //`order_id`, `user_id`, `transaction_id`, `transaction_ref_no`, `booking_date`, `amount`, `transaction_status`, 
    //`shipping_name`, `shipping_street`, `shipping_city`, `shipping_area`, `shipping_pin_code`, `shipping_message`, 
    //`shipping_mobile`, `shipping_email`SELECT * FROM `web_prd_customer_order` WHERE 1
$p="select *  from web_prd_customer_order where order_id=(select max(order_id) from web_prd_customer_order)";
    $m_order_id=0;       
    $result = $conn->query($p);
    if($result->num_rows > 0) 
     {
      $row = $result -> fetch_array(MYSQLI_ASSOC);
      $m_user_id=$row['user_id'];
      $m_order_id=$row['order_id'];
      $m_booking_date=date('d-m-Y');
      $query2=$conn->query("update web_prd_customer_order set transaction_status='PAID', booking_date='$m_booking_date'  where order_id=$m_order_id");
      //`cart_id`, `user_id`, `prod_id`, `unit_price`, `qty` SELECT * FROM `cart_details` WHERE 1
      $query3=$conn->query("select * from  cart_details where user_id=$m_user_id");
      while($prd=$query3 -> fetch_array(MYSQLI_ASSOC)) 
                {
                 $cart_id1=$prd['cart_id'];
                 $prod_id1=$prd['prod_id'];
                 $unit_price1=$prd['unit_price'];
                 $qty1=$prd['qty'];

                 $query4=$conn->query("insert into  web_prd_customer_order_details (order_id,prod_id,unit_price,qty) values ($m_order_id, $prod_id1, '$unit_price1', '$qty1')");
                 //`id`, `order_id`, `prod_id`, `unit_price`, `qty` SELECT * FROM `web_prd_customer_order_details` WHERE 1
                }
                $query5=$conn->query("delete from cart_details where user_id=$m_user_id");
     }
 header("Location:order_placed.php")

?>