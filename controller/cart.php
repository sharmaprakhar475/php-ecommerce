<?php
include '../conn.php';
include '../functions/cart.php';
$data = json_decode(file_get_contents("php://input"),true);
print_r($data);
if(isset($data['function']) && ($data['function']=='addItemToCart')){
    $item_id=$data['item_id'];
    $qty=$data['qty'];
    addItemToCart($conn,$item_id,$qty);
    exit;
}
if(isset($data['function']) && ($data['function']=='removeItemFromCart')){
    $item_id=$data['item_id'];
    removeItemFromCart($conn,$item_id);
    exit;
}
if(isset($data['function']) && ($data['function']=='updateQty')){
    $item_id=$data['item_id'];
    $qty=$data['qty'];
    updateQty($conn,$item_id,$qty);
    exit;
}
if(isset($data['function']) && ($data['function']=='clearCart')){
    
    clearCart();
    exit;
}

?>