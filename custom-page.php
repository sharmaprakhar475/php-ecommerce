<?php
include './conn.php';
include './constants.php';
$admin_query=mysqli_query($conn,"select * from admin_settings ");
$admin_arr=mysqli_fetch_assoc($admin_query);
$admin_site_title=$admin_arr['site_title'];
$admin_logo_url=$base_url.$admin_arr['logo_url'];    
$id=$_GET['id'];
$csp_query=mysqli_query($conn,"select * from custom_pages where id='".$id."'");
$csp_arr=mysqli_fetch_assoc($csp_query);
$csp_title=$csp_arr['title'];
$csp_content=$csp_arr['content'];
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/about-us.html   11 Nov 2019 12:44:33 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $admin_site_title." - ".$csp_title; ?></title>
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
    <?php include './include/header.php'?>
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width"><?php echo $csp_title; ?></h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        <div class="container">
        <?php echo $csp_content; ?>
        </div>
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

<!-- belle/about-us.html   11 Nov 2019 12:44:39 GMT -->
</html>