<?php 
namespace App\Interfaces;

interface UserRepositoryInterface{  
    public function update($request,$user_id);
    public function checkMatch($val,$val2);
    public function store($request);
    public function getRow($user);
    
}
 