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
} // end  1

 
function quickRandom($length = 16)
{
  $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
  return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
}

