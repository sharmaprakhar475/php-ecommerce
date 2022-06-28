<?php
include 'conn.php';
include 'constants.php';
$admin_query=mysqli_query($conn,"select * from admin_settings ");
$admin_arr=mysqli_fetch_assoc($admin_query);
$admin_site_title=$admin_arr['site_title'];
$admin_logo_url=$base_url.$admin_arr['logo_url'];
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/collection-page.html   11 Nov 2019 12:47:02 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $admin_site_title; ?> - Products Page</title>
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
	<?php include './include/header.php'; ?>
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Products Page</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container collection-box">
        	<div class="row">
               <?php
                    $search="";
                    $sql="select * from product limit 8";
                    $search=$_GET['search'];
                    if($search==""){
                        $sql="select * from product limit 8";
                    }
                    else{
                        $sql="select * from product where title like '%$search%' limit 8";
                    }
                    $pquery1=mysqli_query($conn,$sql);
                    while($parr1=mysqli_fetch_assoc($pquery1)){
                    $p_id=$parr1['id'];
                    $piquery1=mysqli_query($conn,"select * from product_images where product_id='".$p_id."' limit 1");
                    $piarr1=mysqli_fetch_assoc($piquery1);
                    $p_title=$parr1['title'];
                    $p_img=$base_url.$piarr1['img_path'];
                    $p_des=$parr1['description']; 
                ?>
                   <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                   <div class="colletion-item">
                       <a href="<?php echo "./product.php?id=$p_id"; ?>">
                           <img class="blur-up lazyload" data-src="<?php echo $p_img; ?>" src="<?php echo $p_img; ?>" alt="image" title="">
                           <span class="title"><span><?php echo $p_title; ?></span></span>
                       </a>
                   </div>
                  </div>
                   <?php
                }
                ?>
                
                <!-- <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                	<div class="colletion-item">
                        <a href="#">
                            <img class="blur-up lazyload" data-src="assets/images/collection/collection-page8.jpg" src="assets/images/collection/collection-page8.jpg" alt="image" title="">
                            <span class="title"><span>Jewellery</span></span>
                        </a>
                    </div>
               	</div> --> 


            </div>
        </div>
        
    </div>
    <!--End Body Content-->
    
    <?php include './include/footer.php';?>
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

<!-- belle/collection-page.html   11 Nov 2019 12:47:11 GMT -->
</html>