<?php
@session_start();
function orderPlaced($conn,$data){       
    $sql0="insert into orders (first_name,last_name,mobile,email,company,address,apartment,city,postcode,remarks,country,state,amount,total_qty,created_by) values ('".$data['firstname']."','".$data['lastname']."','".$data['phone']."','".$data['email']."','".$data['company']."','".$data['address_1']."','".$data['address_2']."','".$data['city']."','".$data['postcode']."','".$data['remark']."','".$data['country']."','".$data['state']."','".$data['amt']."','".$data['totalqty']."','".$_SESSION['user_id']."');";
    $query2=mysqli_query($conn,$sql0);
    if($query2){
        $sql1="select * from orders o order by created_at desc limit 1";
        $query3=mysqli_query($conn,$sql1);
        $arr=mysqli_fetch_assoc($query3);
        $oid=$arr['id'];
        foreach($_SESSION['cart_items'] as $i => $cart_row){   
            $Item_Id=$cart_row['item_id'];
            $quantity=$cart_row['qty'];
            $query4=mysqli_query($conn,"select * from product p where p.id=$Item_Id;");
            $arr4=mysqli_fetch_assoc($query4);
            $price=$arr4['price'];
            $sql2="insert into `order_detail` (`order_id`,`product_id`,`price`,`qty`) values ('$oid','$Item_Id','$price','$quantity')";
            $query5=mysqli_query($conn,$sql2);
        }
        return array("msg"=>"Order Placed", "error"=>false);
    }
    return array("msg"=>"Oops something went wrong", "error"=>true);
}
function cancelOrder($conn,$data){       
    $sql0="update orders set order_type='C' where id='".$data."'";
    if($query2=mysqli_query($conn,$sql0)){
        return array("msg"=>"Order Cancelled", "error"=>false);
    }
    return array("msg"=>"Oops something went wrong", "error"=>true);
}
?>