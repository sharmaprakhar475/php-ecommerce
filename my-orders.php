<?php
include 'conn.php';
if(!isset($_SESSION['cart_items']) || !isset($_SESSION['user_id']))
{
    exit();
}
$admin_query=mysqli_query($conn,"select * from admin_settings ");
$admin_arr=mysqli_fetch_assoc($admin_query);
$admin_site_title=$admin_arr['site_title'];
$admin_logo_url=$admin_arr['logo_url'];
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/cart.html   11 Nov 2019 12:47:01 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $admin_site_title; ?> - Your orders</title>
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
        		<div class="wrapper"><h1 class="page-width">Your orders</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 main-col">
                	<form action="#" method="post" class="cart style2">
                		<table>
                            <thead class="cart__row cart__header">
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Mobile</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Order type</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Method of payment</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Time</th>
                                    <th></th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                    		<tbody>
                                <?php
                                    $user_id=$_SESSION['user_id'];
                                    $user_name=$_SESSION['name'];
                                    $orquery=mysqli_query($conn,"select * from orders o where o.created_by=$user_id");
                                    while($oarr=mysqli_fetch_assoc($orquery)){
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

                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="text-center">
                                        <?php echo $or_id; ?>    
                                    </td>
                                    <td class="text-center">
                                        <?php echo $or_firstname." ".$or_lastname; ?>    
                                    </td>
                                    <td class="text-center">
                                        <?php echo $or_mobile; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $or_email; ?>    
                                    </td>
                                    <td class="text-center">
                                        <?php if($or_type=='C') {echo "Cancelled";}else {echo "General";}?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $or_address." ".$or_apartment." ".$or_city." ".$or_state." ".$or_country."-".$or_postcode; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $or_payment_method; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $or_amount; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $or_total_qty; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $or_created_at; ?>
                                    </td>
                                    <td>
                                        <button type="button" onclick="" ><a alt="Details" href="./order_details.php?id=<?php echo $or_id; ?>">Detail</a></button>
                                    </td>
                                    <?php
                                        if($or_type!='C'){
                                    ?>
                                        <td>
                                            <button type="button" onclick="cancel_order(<?php echo $or_id;?>)" alt="Cancel order" ><img src="./assets/images/close.png" /></button>
                                        </td>
                                    <?php
                                        }
                                    ?>
                                </tr>
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
                    
                    
                    </form>                   
               	</div>
               
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
    function cancel_order(id){
        if (confirm("Do you want to cancel?") == true) {
            axios.post('./controller/order.php', {
                id,
                function:'cancelOrder'
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
</script>
<!-- belle/cart.html   11 Nov 2019 12:47:01 GMT -->
</html>