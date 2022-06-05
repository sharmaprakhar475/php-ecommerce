<?php
@session_start();

function getall()
{
    $currency_query=mysqli_query($conn,"select * from currencies ");
    while($currency_arr=mysqli_fetch_assoc($currency_query)){
        $currency_id=$currency_arr['id'];
        $currency_title=$currency_arr['title'];
        $currency_status=$currency_arr['status'];
        if($currency_status==1)
        {
            return $currency_title;
        }
    }
}
?>