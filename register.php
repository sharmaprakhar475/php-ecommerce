<?php 
    include './conn.php';
    include './constants.php';
    $admin_query=mysqli_query($conn,"select * from admin_settings ");
    $admin_arr=mysqli_fetch_assoc($admin_query);
    $admin_site_title=$admin_arr['site_title'];
    $admin_logo_url=$base_url.$admin_arr['logo_url'];
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/register.html   11 Nov 2019 12:22:27 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $admin_site_title; ?> - Create an Account</title>
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
        		<div class="wrapper"><h1 class="page-width">Create an Account</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                          <div class="row">
	                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="name">Name<span style="color:red;">*</span></label>
                                    <input type="text" maxlength="100" name="name" placeholder="" onkeypress="checkEnterClick(event)" id="name" autofocus="">
                                </div>
                               </div>
                               <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="mobile_number">Mobile Number<span style="color:red;">*</span></label>
                                    <input type="text" maxlength="10" name="mobile_number" placeholder="" onkeypress="checkEnterClick(event)" id="mobile_number">
                                </div>
                               </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="email">Email<span style="color:red;">*</span></label>
                                    <input type="email" maxlength="100" name="email" placeholder="" onkeypress="checkEnterClick(event)" id="email" class="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="password">Password<span style="color:red;">*</span></label>
                                    <input type="password" maxlength="20" value="" name="password" onkeypress="checkEnterClick(event)" placeholder="" id="password" class="">                        	
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="repassword">Retype Password<span style="color:red;">*</span></label>
                                    <input type="password" maxlength="20"  value="" name="repassword" placeholder="" onkeypress="checkEnterClick(event)" id="repassword" class="">                        	
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="address_1">Address line 1</label>
                                    <input type="text" name="address_1" placeholder="" onkeypress="checkEnterClick(event)" id="address_1">                        	
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="address_2">Address line 2</label>
                                    <input type="text" name="address_2" placeholder="" onkeypress="checkEnterClick(event)" id="address_2" >                        	
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" placeholder="" onkeypress="checkEnterClick(event)" id="city">                        	
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select name="state" id="state" onkeypress="checkEnterClick(event)">
                                        <option value=""> --- Please Select --- </option>
                                            <?php 
                                                $indian_states=file_get_contents("IndianStates.json");
                                                $indian_states=json_decode($indian_states);
                                                foreach($indian_states as $row){
                                            ?>
                                        <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                                            <?php
                                                }
                                            ?>
                                    </select>                        	
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="pincode">Pincode</label>
                                    <input type="text" name="pincode" placeholder=""  onkeypress="checkEnterClick(event)" id="pincode">                        	
                                </div>
                            </div>
                            
                          </div>
                          <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <button type="button" class="btn mb-3" onclick="register()" >Create</button>
                            </div>
                         </div>
                     </form>
                    </div>
               	</div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
    
    <script src="assets/js/general_functions.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>
    function register(){  
        const user={
            name:document.getElementById("name").value,
            mobile:document.getElementById("mobile_number").value,
            email:document.getElementById("email").value,
            password:document.getElementById("password").value,
            repassword:document.getElementById("repassword").value,
            address1:document.getElementById("address_1").value,
            address2:document.getElementById("address_2").value,
            city:document.getElementById("city").value,
            state:document.getElementById("state").value,
            pincode:document.getElementById("pincode").value
        };
        axios.post('./controller/user.php', {
            user,
            function:'userRegister'
        }).then(res => {
            res_data=res.data;
            alertMsg(res_data['msg'],res_data['error']);
            if(!res_data['error']){
                setTimeout(() => {
                    window.location="./login.php";
                }, 2000); 
            }
        }).catch(err => {
            alert(err.response.data);
        })
    }
    function checkEnterClick(e){
        if(e.keyCode == 13){
            register();
        }
    }
    </script>
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

<!-- belle/register.html   11 Nov 2019 12:22:27 GMT -->
</html>