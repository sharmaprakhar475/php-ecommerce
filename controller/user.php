<?php
include '../conn.php';
include '../functions/user.php';
$data = json_decode(file_get_contents("php://input"),true);
if(isset($data['function']) && ($data['function']=='userRegister')){
    $user=$data['user'];
    $name=$user['name'];
    $mobile=$user['mobile'];
    $email=$user['email'];
    $password=$user['password'];
    $repassword=$user['repassword'];
    $address1=$user['address1'];
    $address2=$user['address2'];
    $city=$user['city'];
    $state=$user['state'];
    $pincode=$user['pincode'];
    $res=userRegister($conn,$name,$mobile,$email,$password,$repassword,$address1,$address2,$city,$state,$pincode);
    echo json_encode($res);
    exit();
}

if(isset($data['function']) && ($data['function']=='userLogin')){
    $user=$data['user'];
    $email=$user['email'];
    $password=$user['password'];
    $res=userLogin($conn,$email,$password);
    echo json_encode($res);
    exit();
}
if(isset($data['function']) && ($data['function']=='requestCall')){
    $request_detail=$data['request_detail'];
    $item_id=$request_detail['item_id'];
    $user_name=$request_detail['name'];
    $user_mobile=$request_detail['mobile'];
    $request_detail=array("product_id"=>$item_id,"user_name"=>$user_name,"user_mobile"=>$user_mobile);
    $resp=requestCall($conn,$request_detail);
    echo json_encode($resp);
    exit();
}

if(isset($data['function']) && ($data['function']=='userLogout')){
    $res=userLogout();
    echo json_encode($res);
    exit();
}
if(isset($data['function']) && ($data['function']=='subscribe')){
    $email=$data['email'];
    $res=subscribe($conn,$email);
    echo json_encode($res);
    exit();
}
if(isset($data['function']) && ($data['function']=='chatTawk')){
    $res=chatTawk($conn);
    echo json_encode($res);
    exit();
}
?>