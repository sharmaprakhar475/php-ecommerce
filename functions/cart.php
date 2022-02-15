<?php
@session_start();
function addItemToCart($conn,$item_id,$qty)
{
    if(!isset($_SESSION['cart_items'])){
        $_SESSION['cart_items']=[];
    }
    $_SESSION['cart_items'][]=array("item_id"=>$item_id,"qty"=>$qty);
    return $_SESSION['cart_items'];
}

function clearCart()
{
    $_SESSION['cart_items']=[];
}

function removeItemFromCart($conn,$item_id)
{    
    foreach($_SESSION['cart_items'] as $i => $cart_row)
    {
        if($cart_row['item_id']==$item_id)
        {
            array_splice($_SESSION['cart_items'],$i,1);
            exit();
        }        
    }
}

function updateQty($conn,$item_id,$qty)
{
    foreach($_SESSION['cart_items'] as $i => $cart_row)
    {
        if($cart_row['item_id']==$item_id)
        {
            $_SESSION['cart_items'][$i]['qty']=$qty;
            exit();        
        }
    }
}
?>