<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\GroupRepositoryInterface;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    protected $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function index()
    {

        $groups = Group::paginate(10);
        return   view('admin.groups.index', compact('groups'));
    }


    public function store(Request $request)
    {
        $invo =  $this->groupRepository->store($request);
        $output =  $this->groupRepository->getRow($invo);
        return  $output;
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
        $invo = Group::find($id);
        return  response()->json($invo);
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
        $invo = Group::whereId($id)->first();

        $invo->update($request->only(
            'name',
            'color' 
        ));

        $output =  $this->groupRepository->getRow($invo);
        return  $output;
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invo=Group::find($id);
        if($invo){
            $invo->delete();
            return redirect()->back()->with('message', 'تم الحذف   ');
        }
        
      return redirect()->back()->with('error2', 'هذا العنصر غير موجود');
    }
}
