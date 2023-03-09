<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttentionsStoreRequest;
use App\Interfaces\InvitationRepositoryInterface;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Response;

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
        return view('admin.invitations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invo =  $this->invitationRepository->storePublic($request);
         
        $is_out = "";
        if($invo->is_out == 1) { $is_out = "خارجي"; }
        $output  = '<tr>' .
                    '<td>' . $invo->id . '</td>' .
                    '<td>' . $invo->created_at . '</td>' .
                    '<td>' . $invo->name . '</td>' .
                    '<td>' . $invo->mobile . '</td>' .
                    '<td>' . $invo->email . '</td>' .
                    '<td>' . getStatus($invo->status) . '</td>' .
                    '<td>' .  $is_out . '</td>' .
                    '<td><input type="checkbox"></td>' .
                    '<td><a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i class="material-icons">&#xe3c9;</i></a> <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a> <a href="#" class="settings" title="استعراض" data-toggle="tooltip"><i class="material-icons">&#xe8b6;</i></a> <a href="#" class="settings" title="طباعة" data-toggle="tooltip"><i class="material-icons">&#xe8ad;</i></a><a href="#" class="settings" title="طباعة مع حلفية" data-toggle="tooltip"><iclass="material-icons text-success">&#xe8ad;</i></td>' .
                    '</tr>';
        return  $output ;  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function attentions(){
       $invos =  Invitation::where('is_attentions','1')->get();
        return view('admin.invitations.attentions',compact('invos'));
    }

    public function public(){
       
        $invos =  Invitation::where('is_attentions','0')->get();
        return view('admin.invitations.public',compact('invos'));
    }
    
    public function sendAttentions(AttentionsStoreRequest $request){
       
        $invo =  $this->invitationRepository->storeAttentions($request);
        $output  = '<tr>' .
                    '<td>' . $invo->id . '</td>' .
                    '<td>' . $invo->created_at . '</td>' .
                    '<td>' . $invo->name . '</td>' .
                    '<td>' . $invo->mobile . '</td>' .
                    '<td>' . $invo->email . '</td>' .
                    '<td><input type="checkbox"></td>' .
                    '<td><a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i class="material-icons">&#xe3c9;</i></a> <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a> <a href="#" class="settings" title="استعراض" data-toggle="tooltip"><i class="material-icons">&#xe8b6;</i></a> <a href="#" class="settings" title="طباعة" data-toggle="tooltip"><i class="material-icons">&#xe8ad;</i></a><a href="#" class="settings" title="طباعة مع حلفية" data-toggle="tooltip"><iclass="material-icons text-success">&#xe8ad;</i></td>' .
                    '</tr>';
        return  $output ;  

    }
    
    
}
