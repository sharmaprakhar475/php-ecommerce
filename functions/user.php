<?php
@session_start();
function userRegister($conn,$name,$mobile,$email,$password,$address1,$address2,$city,$state,$pincode){   
    $sql1="select * from user u where u.email='$email'";
    $sql="insert into `user` (`name`,`mobile`,`email`,`password`,`address_1`,`address_2`,`city`,`state`,`pincode`) values ('$name','$mobile','$email','$password','$address1','$address2','$city','$state','$pincode');";
    $query1=mysqli_query($conn,$sql1);
    $arr=mysqli_fetch_assoc($query1);
    if(!$arr){
        if(!$arr){
            $query=mysqli_query($conn,$sql);
            return array("msg"=>"Registered Successfully", "error"=>false);
        }
    }
    return array("msg"=>"Oops something went wrong", "error"=>true);
}

function userLogin($conn,$email,$password){
    $sql="select * from user u where u.email='$email' and u.password='$password'";
    $query = mysqli_query($conn,$sql);
    $arr=mysqli_fetch_assoc($query);
    if($arr){
        $_SESSION['email']=$email;
        $_SESSION['name']=$arr['name'];
        $_SESSION['user_id']=$arr['id'];
        return array("msg"=>"Login Successfully", "error"=>false);
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
    $sql="insert into request_callback(user_name,user_mobile,product_id) values ('".$data['user_name']."','".$data['user_mobile']."','".$data['product_id']."')";
    if($query = mysqli_query($conn,$sql)){
        return array("msg"=>"Requested Callback Successfully", "error"=>false);
    }
    return array("msg"=>"Oops something went wrong", "error"=>true);    
}
?>