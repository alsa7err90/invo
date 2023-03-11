<?php 
namespace App\Interfaces;

interface TableRepositoryInterface{
    public function store($request);  
    public function getRow($request);  
    public function update($request,$id);
}
 