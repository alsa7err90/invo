<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicStoreRequest;
use App\Interfaces\InvitationRepositoryInterface;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    protected $invitationRepository;

    public function __construct(InvitationRepositoryInterface $invitationRepository)
    {
        $this->invitationRepository = $invitationRepository; 
    }

    public function welcome(){
        return view('welcome');
    }
    public function new_invo(PublicStoreRequest $request){
        $request->request->add(['is_out' => '1']);
        $invo =  $this->invitationRepository->storePublic($request); 
       if($invo){
        $complated = true;
       }
       else{
        $complated = false;
       }
        return view('complate_register',compact('complated'));
        
       
    }
}
