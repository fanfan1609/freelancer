<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function combine_array($a,$b){
    if( !is_array($a) ){
        $a = array($a);
    }
    if( !is_array($b) ) {
        $b = array($b);
    }
//    $a = array_filter($a);
//    $b = array_filter($b);
    if( empty($a) ) return $b;
    if( empty($b) ) return $a;
    
    $result = array();
    foreach($a as $k_a){
        $result[$k_a] = $b;
    }
    
    return combine_string($result);
}

function combine_string($ar){
    $result = array();
    foreach($ar as $k => $val){
        foreach($val as $v){
            array_push($result, $k.$v);
        }
    }
    return $result;
}

function removeNewLine($item){
    return trim($item);
}

function removeEmptyLine($item){
    return trim($item) != "";
}