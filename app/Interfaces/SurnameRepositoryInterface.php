<?php 
namespace App\Interfaces;

interface SurnameRepositoryInterface{  
    public function store($request);
    public function getRow($invo);
    
}
