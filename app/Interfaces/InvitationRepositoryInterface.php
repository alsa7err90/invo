<?php 
namespace App\Interfaces;

interface InvitationRepositoryInterface{  
    public function storeAttentions($request);
    public function storePublic($request);
    public function getRow($invo);
    
}
