<?php


function formatDate($date){

    return date("m/d/Y", strtotime($date));

}



function peso($amount){

    return "₱".number_format($amount,2);

}



?>