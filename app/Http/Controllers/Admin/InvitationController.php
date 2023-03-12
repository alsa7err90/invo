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
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Facades\Excel;

// 1- index
// 2- store
// 3- show
// 4- edit
// 5- update
// 6- destroy
// 7- attentions  - get just invitations attentions 
// 8- public - get just public attentions
// 9- exportAll
// 10- exportPublic
// 11- exportAtt
// 12- print 
class InvitationController extends Controller
{
    protected $invitationRepository;

    public function __construct(InvitationRepositoryInterface $invitationRepository)
    {
        $this->invitationRepository = $invitationRepository; 
         $this->middleware('permission:accepted_invo', ['only' => ['index']]);
         $this->middleware('permission:send_invo', ['only' => ['attentions','store']]);
         $this->middleware('permission:public_invo', ['only' => ['public']]);

    } 
    // 1
    public function index()
    {
        $invos = Invitation::paginate(env('PAGINATE'));
        return view('admin.invitations.index',compact('invos'));
    }
    // 2
    public function store(PublicStoreRequest $request)
    {
        $invo =  $this->invitationRepository->storePublic($request);
        $output =  $this->invitationRepository->getRow($invo); 
        return  $output ;  
    } 
    // 3
    public function show($id)
    {
        $invo = Invitation::find($id);
        $output =  $this->invitationRepository->getTable($invo); 
        return $output;
    }

    // 4
    public function edit($id)
    {
        $invo = Invitation::find($id);
        return  response()->json($invo,Response::HTTP_OK);
    }
 
    // 5
    public function update(Request $request, $id)
    {
        $invo =  $this->invitationRepository->update( $request, $id);
        $output =  $this->invitationRepository->getRow($invo); 
        return  $output ;   
    }
    // 6
    public function destroy($id)
    { 
        $invo=Invitation::find($id);
        if($invo){
            $invo->delete();
            return redirect()->back()->with('message', 'تم الحذف   ');
        } 
      return redirect()->back()->with('error2', 'هذا العنصر غير موجود');
    }
    // 7
    public function attentions(){
       $invos =  Invitation::where('is_attentions','1')->paginate(env('PAGINATE'));;
        return view('admin.invitations.attentions',compact('invos'));
    }
    // 8
    public function public(){
       
        $invos =  Invitation::where('is_attentions','0')->paginate(env('PAGINATE'));;
        return view('admin.invitations.public',compact('invos'));
    }
    // 9
    public function exportAll() 
    {
        return Excel::download(new InvitationExport, 'Invitations.xlsx');
    }
    // 10
    public function exportPublic() 
    {
        return (new InvitationPublicExport('0'))->download('Invitations.xlsx'); 
    }
    // 11
    public function exportAtt() 
    {
        return (new InvitationAtteExport('1'))->download('Invitations.xlsx'); 
     }
    //  12
     public function print(Request $request,$id) 
     {
        $invo = Invitation::whereId($id)->first();
        if(isset($_GET['image']) &&$_GET['image'] == 1){
             return view('admin.invitations.print_with_backgroun',compact('invo'));
        }
      
         return view('admin.invitations.print',compact('invo'));
      }
     
}
