<?php

namespace App\Repository;
 
use App\Interfaces\InvitationRepositoryInterface;
use App\Models\Invitation;
use App\Models\Meet;

class InvitationRepository implements InvitationRepositoryInterface
{ 
    public function storeAttentions($request){
        $meet_id = 1;
        $request->request->add(['meet_id' => $meet_id]); 
        $request->request->add(['is_attentions' => 1]); 
        
        $invo = Invitation::create($request->all());
      return $invo;
    }
}
