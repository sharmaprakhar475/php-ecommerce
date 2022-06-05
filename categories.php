<?php
include 'conn.php';
$admin_query=mysqli_query($conn,"select * from admin_settings ");
$admin_arr=mysqli_fetch_assoc($admin_query);
$admin_site_title=$admin_arr['site_title'];
$admin_logo_url=$admin_arr['logo_url'];
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/collection-page.html   11 Nov 2019 12:47:02 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $admin_site_title; ?> - Category Page</title>
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
        		<div class="wrapper"><h1 class="page-width">Category Page</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container collection-box">
        	<div class="row">
                <?php
                   $cquery1=mysqli_query($conn,"select * from category where parent_id=0 ");
                   while($carr1=mysqli_fetch_assoc($cquery1)){
                   $c_id=$carr1['id'];
                   $c_name=$carr1['name'];
                   $c_img=$carr1['img_path'];
                   $c_des=$carr1['description']; 
                ?>
                   <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                   <div class="colletion-item">
                       <a href="<?php echo "./category-details.php?id=$c_id"; ?>">
                           <img class="blur-up lazyload" data-src="<?php echo $c_img; ?>" src="<?php echo $c_img; ?>" alt="image" title="">
                           <span class="title"><span><?php echo $c_name; ?></span></span>
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