<?php
include '../conn.php';
include '../functions/order.php';
$data = json_decode(file_get_contents("php://input"),true);
if(isset($data['function']) && ($data['function']=='addToOrder')){
    $order=$data['order'];
    $firstname=$order['firstname'];
    $lastname=$order['lastname'];
    $phone=$order['phone'];
    $email=$order['email'];
    $company=$order['company'];
    $address_1=$order['address_1'];
    $address_2=$order['address_2'];
    $city=$order['city'];
    $state=$order['zone'];
    $country=$order['country'];
    $postcode=$order['postcode'];
    $remark=$order['remark'];
    $total=0; $total_qty=0;
    foreach($_SESSION['cart_items'] as $i => $cart_row)
    {   
        $itemId=$cart_row['item_id'];
        $quantity1=$cart_row['qty'];
        $pquery=mysqli_query($conn,"select * from product p where p.id=$itemId;");
        $pquery_img=mysqli_query($conn,"select * from product_images pi where pi.product_id=$itemId limit 1;");
        $parr_img=mysqli_fetch_assoc($pquery_img);
        $parr1=mysqli_fetch_assoc($pquery);
        $pr_price=$parr1['price'];
        $total=$total+($pr_price*$quantity1);
        $total_qty=$total_qty+$quantity1;
    }
    $amt=$total;
    $totalqty=$total_qty;
    $details=array("firstname"=>$firstname,"lastname"=>$lastname,"phone"=>$phone,"email"=>$email,"company"=>$company,"remark"=>$remark,"address_1"=>$address_1,"address_2"=>$address_2,"city"=>$city,"state"=>$state,"postcode"=>$postcode,"country"=>$country,"amt"=>$amt,"totalqty"=>$totalqty);
    $resp=orderPlaced($conn,$details);
    $_SESSION['cart_items']=[];
    echo json_encode($resp);
    exit();
}
if(isset($data['function']) && ($data['function']=='cancelOrder')){
    $oid=$data['id'];
    $resp=cancelOrder($conn,$oid);
    echo json_encode($resp);
    exit();
}
?>