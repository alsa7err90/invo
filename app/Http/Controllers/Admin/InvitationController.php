<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InvitationAtteExport;
use App\Exports\InvitationExport;
use App\Exports\InvitationPublicExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttentionsStoreRequest;
use App\Http\Requests\PublicStoreRequest;
use App\Interfaces\InvitationRepositoryInterface;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Facades\Excel;

class InvitationController extends Controller
{
    protected $invitationRepository;

    public function __construct(InvitationRepositoryInterface $invitationRepository)
    {
        $this->invitationRepository = $invitationRepository; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invos = Invitation::get();
        return view('admin.invitations.index',compact('invos'));
    }

     
    public function store(PublicStoreRequest $request)
    {
        $invo =  $this->invitationRepository->storePublic($request);
        $output =  $this->invitationRepository->getRow($invo); 
        return  $output ;  
    }

    
    public function show($id)
    {
        $invo = Invitation::find($id);
        $output =  $this->invitationRepository->getTable($invo); 
        return $output;
    }

    
    public function edit($id)
    {
        $invo = Invitation::find($id);
        return  response()->json($invo,Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $invo =  $this->invitationRepository->update( $request, $id);
        $output =  $this->invitationRepository->getRow($invo); 
        return  $output ;   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $invo=Invitation::find($id);
        if($invo){
            $invo->delete();
            return redirect()->back()->with('message', 'تم الحذف   ');
        }
        
      return redirect()->back()->with('error2', 'هذا العنصر غير موجود');
    }

    public function attentions(){
       $invos =  Invitation::where('is_attentions','1')->get();
        return view('admin.invitations.attentions',compact('invos'));
    }

    public function public(){
       
        $invos =  Invitation::where('is_attentions','0')->get();
        return view('admin.invitations.public',compact('invos'));
    }
    
    // public function sendAttentions(AttentionsStoreRequest $request){
       
    //     $invo =  $this->invitationRepository->storeAttentions($request);
    //     $output  = '<tr>' .
    //                 '<td>' . $invo->id . '</td>' .
    //                 '<td>' . $invo->created_at . '</td>' .
    //                 '<td>' . $invo->name . '</td>' .
    //                 '<td>' . $invo->mobile . '</td>' .
    //                 '<td>' . $invo->email . '</td>' .
    //                 '<td><input type="checkbox"></td>' .
    //                 '<td><a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i class="material-icons">&#xe3c9;</i></a> <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a> <a href="#" class="settings" title="استعراض" data-toggle="tooltip"><i class="material-icons">&#xe8b6;</i></a> <a href="#" class="settings" title="طباعة" data-toggle="tooltip"><i class="material-icons">&#xe8ad;</i></a><a href="#" class="settings" title="طباعة مع حلفية" data-toggle="tooltip"><iclass="material-icons text-success">&#xe8ad;</i></td>' .
    //                 '</tr>';
    //     return  $output ;  

    // }
    
    public function exportAll() 
    {
        return Excel::download(new InvitationExport, 'Invitations.xlsx');
    }
    
    public function exportPublic() 
    {
        return (new InvitationPublicExport('0'))->download('Invitations.xlsx');
        
    }
    
    public function exportAtt() 
    {
        return (new InvitationAtteExport('1'))->download('Invitations.xlsx'); 
     }
}
