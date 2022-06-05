<?php
@session_start();

function addItemToCart($conn,$item_id,$qty)
{
    if(!isset($_SESSION['cart_items'])){
        $_SESSION['cart_items']=[];
    }    
    else{
        foreach($_SESSION['cart_items'] as $i => $cart_row)
        {
            if($cart_row['item_id']==$item_id)
            {
                $_SESSION['cart_items'][$i]['qty']=$_SESSION['cart_items'][$i]['qty']+$qty;
                return array("msg"=>"Added", "error"=>false);
            }      
        }
        $_SESSION['cart_items'][]=array("item_id"=>$item_id,"qty"=>$qty);
        return array("msg"=>"Added", "error"=>false);
        
    }
    return array("msg"=>"Oops something went wrong", "error"=>true);
}

function clearCart()
{
    $_SESSION['cart_items']=[];
    return array("msg"=>"Cart cleared", "error"=>false);
}

function removeItemFromCart($conn,$item_id)
{    
    foreach($_SESSION['cart_items'] as $i => $cart_row)
    {
        if($cart_row['item_id']==$item_id)
        {
            array_splice($_SESSION['cart_items'],$i,1);
            return array("msg"=>"Removed", "error"=>false);
            
        }        
    }
    return array("msg"=>"Oops something went wrong", "error"=>true);
}

function updateQty($conn,$item_id,$qty)
{
    foreach($_SESSION['cart_items'] as $i => $cart_row)
    {
        if($cart_row['item_id']==$item_id)
        {
            $_SESSION['cart_items'][$i]['qty']=$qty;
            return array("msg"=>"Quantity updated", "error"=>false);
                  
        }
    }
    return array("msg"=>"Oops something went wrong", "error"=>true);
}

?>