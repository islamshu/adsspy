<?php

use App\General;

if ( ! function_exists('conert_k'))
{
    function conert_k( $cont)
    {
        $count = $cont;
        
        if ($count >= 1000) {
            return round($count/1000, 1) . "k";
        } else {
            return $count;
        }      
    
    }
}
if ( ! function_exists('general'))
{
    function general($item)
    {
        $general = General::first()->$item;
        return $general;    
    }
}