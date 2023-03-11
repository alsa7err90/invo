<?php 
namespace App\Interfaces;

interface GroupRepositoryInterface{  
    public function store($request);
    public function getRow($invo); 
}
