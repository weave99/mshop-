<?php
include_once("includes/conn.php");
require_once("includes/user_sequre_page.php");
?>
                
            
<?php    
/*``order_id`, `trans_no`, `trans_date`, `amount`, `user_id`, `txn_status`, `clnt_txn_ref`, `shipping_name`,
 `shipping_street`, `shipping_city`, `shipping_state_country`, `shipping_pin_code`, `shipping_mobile`, 
 `shipping_email` SELECT * FROM `customer_order` WHERE 1
 */

  $invoice_sql="SELECT * FROM web_prd_customer_order WHERE order_id=(select max(order_id) from web_prd_customer_order)";
  $invoice_query=mysqli_query($conn,$invoice_sql);
  if($order_details=mysqli_fetch_array($invoice_query)) 
  { 
    $user_id1=$order_details['user_id'];
    $order_id1=$order_details['order_id'];
  ?>


  <div style="border:1px solid #000; width:60%;left:50%;transform:translate(-50%,0);position:relative;padding:2em;font-family: Arial, Helvetica, sans-serif;">
    
    <div style="border-bottom:5px solid #ab1e32; display:flex; justify-content: space-between;">

        <div style="width:150px;">
          <img src="img/logo/logo_2.png" style="padding-top:1em;" width="150px" alt="">
        </div>

        <div style="width:250px;">
          <p>Transation No.:  <?php echo $order_details['transaction_id'];?></p>
          <p>Order Date : <?php echo $order_details['booking_date'];?></p>
        </div>

    </div>


    <div style="display:flex; justify-content: space-between;">

      <div style="width:250px;">
        <?php
        //`order_id`, `user_id`, `transaction_id`, `transaction_ref_no`, `booking_date`, `amount`, `transaction_status`, `shipping_name`, `shipping_street`, `shipping_city`, `shipping_area`, `shipping_pin_code`, `shipping_message`, `shipping_mobile`, `shipping_email` SELECT * FROM `web_prd_customer_order` WHERE 1
            $users_sql="SELECT * FROM users WHERE user_id=$user_id1";
            $users_query=mysqli_query($conn,$users_sql);
            if($users_details=mysqli_fetch_array($users_query)) 
            { 
        ?>
        <p>Bill Address</p>
        <small>Name : <?php echo $users_details['name'];?></small><br>
        <small>Mobile No. : <?php echo $users_details['mobile_no'];?></small><br>
        <small>Email : <?php echo $users_details['email'];?></small><br>
        <small>Area : <?php echo $users_details['area'];?></small><br>
        <small>Street : <?php echo $users_details['street'];?></small><br>
        <small>City : <?php echo $users_details['city'];?></small><br>
        <small>Pincode : <?php echo $users_details['pin_code'];?></small>
      </div>
        <?php
            }
        ?>
      <!-- //`order_id`, `user_id`, `transaction_id`, `transaction_ref_no`, `booking_date`, `amount`, `transaction_status`, 
      `shipping_name`, `shipping_street`, `shipping_city`, `shipping_area`, `shipping_pin_code`, `shipping_message`, 
      `shipping_mobile`, `shipping_email` SELECT * FROM `web_prd_customer_order` WHERE 1
          -->
      <div style="width:250px;">
        <p>Shipping Address</p>
        <small>Name : <?php echo $order_details['shipping_name'];?></small><br>
        <small>Mobile No. : <?php echo $order_details['shipping_mobile'];?></small><br>
        <small>Email : <?php echo $order_details['shipping_email'];?></small><br>
        <small>Area : <?php echo $order_details['shipping_area'];?></small><br>
        <small>Street : <?php echo $order_details['shipping_street'];?></small><br>
        <small>City : <?php echo $order_details['shipping_city'];?></small><br>
        <small>Pincode : <?php echo $order_details['shipping_pin_code'];?></small>
      
      </div>
      
    </div>


    <br>
    <hr>


    <table style="  border-collapse: collapse; width: 100%;">

      <tr>
        <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;width: 50%;">Item</th>
        <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;width: 16.66%;">Qty</th>
        <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;width: 16.66%;">Price</th>
        <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;width: 16.66%;">Amount</th>
      </tr>


      <?php
        //`id`, `order_id`, `prod_id`, `unit_price`, `qty`, `color` SELECT * FROM `customer_order_details` WHERE 1
        $sql3="SELECT * FROM web_prd_customer_order_details WHERE order_id='$order_id1'";
        $query3=mysqli_query($conn,$sql3);
        $num=mysqli_num_rows($query3);
        if($num>0)
        {
          $sub_total=0;
          while($prd=mysqli_fetch_array($query3)) 
          {
           $prod_id1=$prd['prod_id'];
           $unit_price1=$prd['unit_price'];
            $qty1=$prd['qty'];


            $query4=mysqli_query($conn,"select * from web_prd_manage_product_details where prod_id=$prod_id1");
            if($f=mysqli_fetch_array($query4)) 
             {
        ?>


      <tr>
        <td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;"><?php echo $f['prod_name'];?> </td>        
        <td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;"> <?php echo $qty1;?></td>
        <td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">₹ <?php echo $unit_price1;?></td>
        <td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">₹ <?php echo number_format($unit_price1*$qty1,2);?></td>
                                                                                  <?php $sub_total=$sub_total*1+$unit_price1*$qty1;?>
      </tr>


      <?php
            }
          }
      ?>
     





      <tr>
        <td style="padding: 8px;text-align: left;">Total</td>
        <td style="padding: 8px;text-align: left;"></td>
        <td style="padding: 8px;text-align: left;"></td>
        <td style="padding: 8px;text-align: left;">₹<?php echo number_format($sub_total,2);?></td>
      </tr>
    <?php
      }
    ?>


    </table>


    <br>
    <hr>
<!--
    <div style="display:flex; justify-content: space-between;">

      <div style="width: 50%;">
        <p><b>Iishraq Electronic International Private Limited</b></p>
        <p>Contact Infomation</p>
        <small>Location : Ground floor, 63 Neheru Colony, Kolkata - 700040, West Bengal</small><br>
        <small>Phone : 9163459111</small><br>
        <small>Email : info@iishraq.com</small>
      </div>

      <div style="width: 33.33%;">
          <div style="text-align:center; margin-top:2em;">
           <img src="images/signature.png" width="100%" alt="">
          </div>
          <div style="text-align:center;">
            <p>Authorized Signature</p>
          </div>

      </div>
      
    </div>
    -->

  </div>  

<?php
}
?>




  <div style="text-align:center; margin:2em;">
    <button onclick="window.print()" type="button" style="padding:8px 42px;text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;
                  background-color:black;
                  color:white;
                  border:none;border-radius: 4px;">
    Print</button>
  </div>