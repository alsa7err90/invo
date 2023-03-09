<?php

// 1 - discFeeFromAmount
 
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

 