<?php
@session_start();
function userRegister($conn,$name,$mobile,$email,$password,$repassword,$address1,$address2,$city,$state,$pincode){   
    if($name=="" || $mobile=="" || $email==""|| $password==""|| $repassword=="" ){
        return array("msg"=>"Please enter the required (*) details", "error"=>true);
    }
    if(strlen($mobile)!=10){
        return array("msg"=>"Please enter the mobile number correctly", "error"=>true);
    }
  	if($password!=$repassword){
    	return array("msg"=>"Please retype the same password", "error"=>true);
    }
    
    $query1=mysqli_query($conn,"select * from user u where u.email='$email'");
  	if(mysqli_num_rows($query1)>0){
    	return array("msg"=>"User with this email already exists", "error"=>true);
    }
    $arr=mysqli_fetch_assoc($query1);
            
    $query=mysqli_query($conn,"insert into `user` (`name`,`mobile`,`email`,`password`,`address_1`,`address_2`,`city`,`state`,`pincode`) values ('$name','$mobile','$email','$password','$address1','$address2','$city','$state','$pincode');");
    return array("msg"=>"Registered Successfully", "error"=>false);
}

function userLogin($conn,$email,$password){
    if($email=="" || $password==""){
        return array("msg"=>"Please enter the credentials", "error"=>true);
    }
    else{
        $query = mysqli_query($conn,"select * from user u where u.email='$email' and u.password='$password'");
        $arr=mysqli_fetch_assoc($query);
        if($arr){
            $_SESSION['email']=$email;
            $_SESSION['name']=$arr['name'];
            $_SESSION['user_id']=$arr['id'];
            return array("msg"=>"Login Successfully", "error"=>false);
        }
    }
    return array("msg"=>"Oops something went wrong", "error"=>true);    
}

function isUserLoggedIn(){
    return (isset($_SESSION['cart_items']) && isset($_SESSION['user_id']));
}

function userLogout(){
    unset($_SESSION);
    session_destroy();
    if(!isset($_SESSION)){
        return array("msg"=>"Logout Successfully", "error"=>false);
    }
    return array("msg"=>"Oops something went wrong", "error"=>true);    
}

function requestCall($conn,$data){
    if($query = mysqli_query($conn,"insert into request_callback(user_name,user_mobile,product_id) values ('".$data['user_name']."','".$data['user_mobile']."','".$data['product_id']."')")){
        return array("msg"=>"Requested Callback Successfully", "error"=>false);
    }
    return array("msg"=>"Oops something went wrong", "error"=>true);    
}

function chatTawk($conn){
    if($query = mysqli_query($conn,"select * from admin_settings")){
        $arr=mysqli_fetch_assoc($query);
        return array("msg"=>$arr['chat_tawk'], "error"=>false);
    }
}

function subscribe($conn,$data){
    if($data!=""){
        $query1= mysqli_query($conn,"select * from newsletters nl where nl.email='$data'");
        $arr1=mysqli_fetch_assoc($query1);
        if(!$arr1){
            if($query = mysqli_query($conn,"insert into newsletters (email) values ('".$data."')")){
                return array("msg"=>"Subscribed Successfully", "error"=>false);
            }
        }
        else{
            return array("msg"=>"Already Subscribed", "error"=>true);
        }
    }
    return array("msg"=>"Oops something went wrong", "error"=>true);    
}
?>