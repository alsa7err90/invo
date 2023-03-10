<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\SearchRepositoryInterface; 
use Illuminate\Http\Request;

class SearchController extends Controller
{

    protected $searchRepository;

    public function __construct(SearchRepositoryInterface $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function searchAttentions(Request $request)
    {
        $invos =  $this->searchRepository->searchAttentions($request);
        $output =  $this->searchRepository->getRowAttentions($invos);
        return $output;
    }

    public function searchPublic(Request $request)
    {
        $invos =  $this->searchRepository->searchPublic($request);
        $output =  $this->searchRepository->getRowPublic($invos);
        return $output;
    }

    public function searchAll(Request $request)
    {
        $invos =  $this->searchRepository->searchAll($request);
        $output =  $this->searchRepository->getRowAll($invos);
        return $output;
    }

    public function searchTable(Request $request)
    {
        $invos =  $this->searchRepository->searchTable($request);
        $output =  $this->searchRepository->getRowTable($invos);
        return $output;
    }
    
    
}
