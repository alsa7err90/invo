<?php 
namespace App\Interfaces;

interface UserRepositoryInterface{  
    public function update($request,$user_id);
    public function checkMatch($val,$val2);
    
}
 