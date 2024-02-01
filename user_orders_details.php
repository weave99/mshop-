<?php
include_once("includes/conn.php");
require_once("includes/user_sequre_page.php");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Invoice</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- PAGE LEVEL STYLES-->
</head>


    <?php    
    /*``order_id`, `trans_no`, `trans_date`, `amount`, `user_id`, `txn_status`, `clnt_txn_ref`, `shipping_name`,
    `shipping_street`, `shipping_city`, `shipping_state_country`, `shipping_pin_code`, `shipping_mobile`, 
    `shipping_email` SELECT * FROM `customer_order` WHERE 1
    */
    $transaction_ref_no=$_REQUEST['transaction_ref_no'];
    $invoice_sql="SELECT * FROM web_prd_customer_order WHERE transaction_ref_no='$transaction_ref_no'";
    $invoice_query=mysqli_query($conn,$invoice_sql);
    if($order_details=mysqli_fetch_array($invoice_query)) 
    { 
    $user_id1=$order_details['user_id'];
    $order_id1=$order_details['order_id'];


    ?>
    <body class="fixed-navbar">
        <div class="page-wrapper">
            <!-- START SIDEBAR-->

            <!-- END SIDEBAR-->
            <div class="content-wrapper p-3">
                <!-- START PAGE CONTENT-->
                <div class="page-content fade-in-up">
                    <div class="ibox invoice">
                        <div class="invoice-header">
                            <h1 class="text-center">Invoice</h1>
                                <div class="row p-2" style="background-color:#e9ecef;">
                                    <div class="col-lg-6">
                                        Invoice No. : <?php echo $order_details['transaction_ref_no'];?>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        Invoice Date : <?php echo $order_details['booking_date'];?>
                                    </div>
                                </div>
                        
                            <div class="row  p-2">


                                <div class="col-lg-12 col-12 pb-2">
                                    <div class="invoice-logo">
                                        <img src="img/logo/logo.png" width="25%" />
                                    </div>
                                </div>
                            

                                <div class="col-6">
                                    
                                    <div>
                                        <div class="m-b-5 font-bold">Invoice from</div>
                                        <div>M / S MONDAL BHANDER</div>
                                        <ul class="list-unstyled m-t-10">
                                            <li class="m-b-5">
                                                <span class="font-strong"></span>B/H/15/1 BROUNFIELD RAW, KOLKATA 700027</li>
                                            <li class="m-b-5">
                                                <span class="font-strong"></span>mondalbhander.shop@gmail.com</li>
                                            <li>
                                                <span class="font-strong"></span>+91 3335943426</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-6 text-right">

                                    <div>
                                        <div class="m-b-5 font-bold">Invoice To</div>
                                        <div><?php echo $order_details['shipping_name'];?></div>
                                        <ul class="list-unstyled m-t-10">

                                            <li><?php echo $order_details['shipping_area'];?>, <?php echo $order_details['shipping_street'];?></li>
                                            <li><?php echo $order_details['shipping_city'];?> <?php echo $order_details['shipping_pin_code'];?></li>
                                            <li class="m-b-5"><?php echo $order_details['shipping_email'];?></li>
                                            <li class="m-b-5"><?php echo $order_details['shipping_mobile'];?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped no-margin table-invoice">
                            <thead>
                                <tr>
                                    <th>Item Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                            $brand_id=$f['brand_id'];
                                            $query5=mysqli_query($conn,"select * from web_prd_manage_brand where brand_id=$brand_id");
                                            if($f_brand=mysqli_fetch_array($query5))

                                            {
                                ?>
                                <tr>
                                    <td>
                                        <div><strong><?php echo $f['prod_name'];?></strong></div><small>Brand : <?php echo $f_brand['brand_name'];?></small></td>
                                    <td><?php echo $qty1;?></td>
                                    <td>₹ <?php echo $unit_price1;?></td>
                                    <td>₹ <?php echo number_format($unit_price1*$qty1,2);?></td>
                                    <?php $sub_total=$sub_total*1+$unit_price1*$qty1;?>
                                </tr>

                                <?php
                                            }
                                        }
                                    }
                                ?>

                            </tbody>
                        </table>
                        <table class="table no-border">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th width="15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-right">
                                    <td>Subtotal:</td>
                                    <td>₹ <?php echo number_format($sub_total,2);?> </td>
                                </tr>
                                <tr class="text-right">
                                    <td>Delivery Charges:</td>
                                    <td>₹ 00.00</td>
                                </tr>
                                <tr class="text-right">
                                    <td class="font-bold font-18">TOTAL:</td>
                                    <td class="font-bold font-18">₹ <?php echo number_format($sub_total,2);?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <button class="btn btn-info" type="button" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</button>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <style>
                        .invoice {
                            padding: 20px
                        }
                        .table-invoice tr td:last-child {
                            text-align: right;
                        }
                    </style>

                </div>

            </div>
        </div>
    </body>
    <?php
    }
    ?>
</html>