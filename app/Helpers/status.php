<?php

// 1 - discFeeFromAmount
// 2 - getStatusLang
// 3 - quickRandom

 
// 1 
 

function getStatus($status)
{
  switch ($status) {
    case 1:
      return "قيد الدراسة";  
    case 2:
      return "تم التأكيد"; 
    case 3:
      return "تم الاعتذار"; 
    default:
      
      break;
  }
} // end  1

// 2 
function getStatusLang($status)
{
  switch ($status) {
    case 0:  
      return "انكليزي"; 
    case 1:
    return "عربي";
    
    default:
      
      break;
  }
} // end  2

//  3 
function quickRandom($length = 16)
{
  $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
  return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
}

// 4
function getStatusAttentions($status){
  switch ($status) {
    case 0:  
      return "دعوة"; 
    case 1:
    return "تسجيل";
    
    default:
      
      break;
  }
}

// 5 
function getStatusAttend($status){
  switch ($status) {
    case 0:  
      return '<i class="fa fa-times" aria-hidden="true"></i>'; 
    case 1:
    return '<i class="fa fa-check" aria-hidden="true"></i>'; 
    
    default:
      
      break;
  }
}