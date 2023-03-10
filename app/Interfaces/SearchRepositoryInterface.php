<?php 
namespace App\Interfaces;

interface SearchRepositoryInterface{  
    public function searchAttentions($request);
    public function searchPublic($request);
    public function getRowAttentions($val);
    public function getRowPublic($val);
    public function searchAll($val);
    public function getRowAll($val);
    
}
 