<?php
include '../conn.php';
include '../functions/cart.php';
$data = json_decode(file_get_contents("php://input"),true);
if(isset($data['function']) && ($data['function']=='addItemToCart')){
    $item_id=$data['item_id'];
    $qty=$data['qty'];
    $resp=addItemToCart($conn,$item_id,$qty);
    echo json_encode($resp);    
    exit;
}
if(isset($data['function']) && ($data['function']=='removeItemFromCart')){
    $item_id=$data['item_id'];
    $resp=removeItemFromCart($conn,$item_id);
    echo json_encode($resp);
    exit;
}
if(isset($data['function']) && ($data['function']=='updateQty')){
    $item_id=$data['item_id'];
    $qty=$data['qty'];
    $resp=updateQty($conn,$item_id,$qty);
    echo json_encode($resp);
    exit;
}
if(isset($data['function']) && ($data['function']=='clearCart')){
    $resp=clearCart();
    echo json_encode($resp);
    exit;
}
?>