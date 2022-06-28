<?php
    include 'conn.php';
    include 'constants.php';
    if(!isset($_SESSION['cart_items'])&& !isset($_SESSION['user_id']))
    {
        exit();
    }
    $id=$_GET['id'];
    $admin_query=mysqli_query($conn,"select * from admin_settings ");
    $admin_arr=mysqli_fetch_assoc($admin_query);
    $admin_site_title=$admin_arr['site_title'];
    $admin_logo_url=$base_url.$admin_arr['logo_url'];
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/cart.html   11 Nov 2019 12:47:01 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $admin_site_title ;?> - Order detail</title>
<meta name="description" content="description">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo $admin_logo_url; ?>" />
<!-- Plugins CSS -->
<link rel="stylesheet" href="assets/css/plugins.css">
<!-- Bootstap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Main Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body class="page-template belle">
<div class="pageWrapper">
	<?php include './include/header.php';?>
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Order detail</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        <?php
            $orquery=mysqli_query($conn,"select * from orders o where o.id=$id");
            $oarr=mysqli_fetch_assoc($orquery);
            $or_id=$oarr['id'];
            $or_firstname=$oarr['first_name'];
            $or_lastname=$oarr['last_name'];
            $or_email=$oarr['email'];
            $or_mobile=$oarr['mobile'];
            $or_type=$oarr['order_type'];
            $or_address=$oarr['address'];
            $or_apartment=$oarr['apartment'];
            $or_city=$oarr['city'];
            $or_postcode=$oarr['postcode'];
            $or_country=$oarr['country'];
            $or_state=$oarr['state'];
            $or_payment_method=$oarr['payment_method'];
            $or_amount=$oarr['amount'];
            $or_total_qty=$oarr['total_qty'];
            $or_created_at=$oarr['created_at'];
        ?>

        <div class="container">
        <div class="row" style="padding-bottom:10px;font-size:15px;">
            <div class="col-md-6 pr-1" style="text-align:left;padding-left:40px">
                <p>Order Id : <?php echo $or_id; ?></p>
                </div>
                <div class="col-md-6 pl-1" style="text-align:left;">
                <p>Name : <?php echo $or_firstname." ".$or_lastname; ?></p>
                </div>
            </div>
            
            <div class="row" style="padding-bottom:10px;font-size:15px;">
                <div class="col-md-6 pr-1" style="text-align:left;padding-left:40px">
                <p>Email : <?php echo $or_email; ?></p>
                </div>
                <div class="col-md-6 pl-1" style="text-align:left;">
                <p>Mobile : <?php echo $or_mobile; ?></p>
                </div>
            </div>
            <div class="row" style="padding-bottom:10px;font-size:15px;">
                <div class="col-md-6 pr-1" style="text-align:left;padding-left:40px">
                <p>Address : <?php echo $or_address; ?></p>
                </div>
                <div class="col-md-6 pl-1" style="text-align:left;">
                <p>Apartment : <?php echo $or_apartment; ?></p>
                </div>
            </div>
            <div class="row" style="padding-bottom:10px;font-size:15px;">
                <div class="col-md-6 pr-1" style="text-align:left;padding-left:40px">
                <p>City : <?php echo $or_city; ?></p>
                </div>
                <div class="col-md-6 pl-1" style="text-align:left;">
                <p>State : <?php echo $or_state; ?></p>
                </div>
            </div>
            <div class="row" style="padding-bottom:10px;font-size:15px;">
                <div class="col-md-6 pr-1" style="text-align:left;padding-left:40px">
                <p>Country : <?php echo $or_country; ?></p>
                </div>
                <div class="col-md-6 pl-1" style="text-align:left;">
                <p>Postcode : <?php echo $or_postcode; ?></p>
                </div>
            </div>
            <div class="row" style="padding-bottom:10px;font-size:15px;">
                <div class="col-md-6 pr-1" style="text-align:left;padding-left:40px">
                <p>Amount : <?php echo "₹".$or_amount; ?></p>
                </div>
                <div class="col-md-6 pl-1" style="text-align:left;">
                <p>Total quantity : <?php echo $or_total_qty; ?></p>
                </div>
            </div>
            <div class="row" style="padding-bottom:10px;font-size:15px;">
                <div class="col-md-6 pr-1" style="text-align:left;padding-left:40px">
                <p>Method of payment : <?php echo $or_payment_method; ?></p>
                </div>
                <div class="col-md-6 pl-1" style="text-align:left;">
                <p>Order type : <?php if($or_type=='C') echo "Cancelled"; else echo "General"; ?></p>
                </div>
            </div>
            
        	<div class="row">
                <div class="col-12 col-sm-12 main-col">
                	<form action="" method="post" class="cart style2">
                		<table>
                            <thead class="cart__row cart__header">
                                <tr>
                                    <th colspan="2" class="text-center">Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <!-- <th class="action">&nbsp;</th> -->
                                </tr>
                            </thead>
                    		<tbody>
                            <?php $subtotal=0;?>
                                <?php
                                $ordquery=mysqli_query($conn,"select * from order_detail od where od.order_id='".$or_id."'");
                                while($ordarr=mysqli_fetch_assoc($ordquery))
                                {   
                                    $ord_id=$ordarr['product_id'];
                                    $ordquery1=mysqli_query($conn,"select * from product p where p.id='".$ord_id."' limit 1;");
                                    $ordarr1=mysqli_fetch_assoc($ordquery1);
                                    $ordquery_img=mysqli_query($conn,"select * from product_images pi where pi.product_id='".$ord_id."' limit 1;");
                                    $ordarr_img=mysqli_fetch_assoc($ordquery_img);
                                    $ord_title=$ordarr1['title'];
                                    $ord_price=$ordarr1['price'];
                                    $ord_mrp=$ordarr1['mrp'];
                                    $ord_wgt=$ordarr1['weight'];
                                    $ord_qty=$ordarr['qty'];
                                    $ord_img=$base_url.$ordarr_img['img_path'];
                                ?>

                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="cart__image-wrapper cart-flex-item" style="align-content:center;">
                                        <a href="#"><img class="cart__image" src="<?php echo $ord_img;?>" alt="<?php echo $ord_title; ?>"></a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item text-center">
                                        <div class="list-view-item__title">
                                            <a href="#"><?php echo $ord_title; ?> </a>
                                        </div>
                                        
                                        <div class="cart__meta-text">
                                            Color: Navy<br>Size: Small<br>
                                        </div>
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item text-center">
                                        <span class="money"><?php echo "₹".($ord_price); ?></span>
                                    </td>
                                    <td class="cart__update-wrapper cart-flex-item text-center">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                <!-- <a class="qtyBtn minus" href="javascript:void(0);"><i class="icon icon-minus"></i></a> -->
                                                <input class="cart__qty-input qty" type="text" name="updates[]" onchange="changeItemQty($(this),<?php echo $ord_id;?>)" id="qty" value="<?php echo $ord_qty;?>" pattern="[0-9]*">
                                                <!-- <a class="qtyBtn plus" href="javascript:void(0);"><i class="icon icon-plus"></i></a> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center small--hide cart-price">
                                        <div><span class="money " > <?php echo "₹".($ord_price*$ord_qty); ?></span></div>
                                    </td>
                                    <!-- <td class="text-center small--hide text-center"> <button class="btn btn--secondary cart__remove" onclick="removeItem(<?php echo $ord_id; ?>)"><i class="icon icon anm anm-times-l"></i></button></td> -->

                                </tr>
                                <?php $subtotal=($subtotal+$ord_price*$ord_qty);?>
                                <?php
                                }
                                ?>

                               
                            </tbody>
                    		<tfoot>
                                <tr>
                                    <td colspan="3" class="text-left"><a href="./index.php" class="btn--link cart-continue"><i class="icon icon-arrow-circle-left"></i> Continue shopping</a></td>
                                    <!-- <td colspan="3" class="text-right"><button type="submit" name="update" class="btn--link cart-update"><i class="fa fa-refresh"></i> Update</button></td> -->
                                </tr>
                            </tfoot>
                    </table>
                    
                    <!-- <div class="currencymsg">We processes all orders in USD. While the content of your cart is currently displayed in USD, the checkout will use USD at the most current exchange rate.</div>
                    <hr>
					<div id="shipping-calculator" class="mb-4">
                    	<h5 class="small--text-center">Get shipping estimates</h5>
                        <div class="row">
                        	<div class="col-12 col-sm-12 col-md-4">
                            	<div class="form-group">
                                	<label for="address_country">Country</label>
                          			<select id="address_country" name="address[country]" data-default="United States"><option value="Belgium" data-provinces="[]">Belgium</option>
                                        <option value="---" data-provinces="[]">---</option>
                                        <option value="Afghanistan" data-provinces="[]">Afghanistan</option>
                                        </select>
                            	</div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                            	<div class="form-group">
                                	<label>State</label>
                          			<select id="address_province" name="address[province]" data-default="">
                                      <option value="Alabama">Alabama</option>
                                      </select>
                            	</div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                            	<div class="form-group">
                                	<label for="address_zip">Postal/Zip Code</label>
                          			<input type="text" id="address_zip" name="address[zip]">
                            	</div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 actionRow text-center">
      							<div><input type="button" class="btn btn--secondary get-rates" value="Calculate shipping"></div>
  							</div>
                        </div>
                    </div>  -->
                    
                    </form>                   
               	</div>
                <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                	
                    <div class="solid-border">
                      <div class="row">
                      	<span class="col-12 col-sm-6 cart__subtotal-title"><strong>Subtotal</strong></span>
                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money"><?php echo $subtotal; ?></span></span>
                      </div>
                      <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                      <p class="cart_tearm">
                        <label>
                          <input type="checkbox" name="tearm" id="cartTearm" class="checkbox" value="tearm" required="">
                           I agree with the terms and conditions</label>
                      </p>
                      <button type="button"  name="checkout" id="cartCheckout" class="btn btn--small-wide checkout" value="Checkout" onclick="checkOut()"><span>Checkout</span></button>
                      <div class="paymnet-img"><img src="assets/images/payment-img.jpg" alt="Payment"></div>
                    </div>

                </div>
            </div> -->
        </div>
        
    </div>
    <!--End Body Content-->
    
    <?php include './include/footer.php'?>
       <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->
    
     <!-- Including Jquery -->
     <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
     <script src="assets/js/vendor/jquery.cookie.js"></script>
     <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/wow.min.js"></script>
     <!-- Including Javascript -->
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/plugins.js"></script>
     <script src="assets/js/popper.min.js"></script>
     <script src="assets/js/lazysizes.js"></script>
     <script src="assets/js/main.js"></script>
     
</div>

</body>
<script src="assets/js/general_functions.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>

function removeItem(item_id){
    if (confirm("Do you want to remove?") == true) {  
        axios.post('./controller/cart.php', {
        item_id,
        function:'removeItemFromCart'
        }).then(res => {
            res_data=res.data;
            alertMsg(res_data['msg'],res_data['error']);    
            setTimeout(() => {
                window.location=window.location.href;
            }, 2000); 
        }).catch(err => {
            alert(err.response.data);
        })
    }
}

function changeItemQty(a,b){
    const q = a.val();  
    axios.post('./controller/cart.php', {
    item_id:b,
    qty:q,
    function:'updateQty'
    }).then(res => {
        res_data=res.data;
        alertMsg(res_data['msg'],res_data['error']);    
        setTimeout(() => {
            window.location=window.location.href;
        }, 2000);     
    }).catch(err => {
        alert(err.response.data);
    })
}

function checkOut(){
    window.location="./checkout.php";
}
</script>
<!-- belle/cart.html   11 Nov 2019 12:47:01 GMT -->
</html>