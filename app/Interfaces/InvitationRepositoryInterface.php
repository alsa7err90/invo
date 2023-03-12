<?php 
namespace App\Interfaces;

interface InvitationRepositoryInterface{   
    public function storePublic($request);
    public function update($request,$id);
    public function getRow($invo);
    public function getTable($invo);
    
}
