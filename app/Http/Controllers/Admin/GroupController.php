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

        $groups = Group::paginate(env('PAGINATE'));
        return   view('admin.groups.index', compact('groups'));
    }


    public function store(Request $request)
    {
        $invo =  $this->groupRepository->store($request);
        $output =  $this->groupRepository->getRow($invo);
        return  $output;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $invo = Group::find($id);
        return  response()->json($invo);
    }
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

    public function destroy($id)
    {
        $invo = Group::find($id);
        if ($invo) {
            $invo->delete();
            return redirect()->back()->with('message', 'تم الحذف   ');
        }
        return redirect()->back()->with('error2', 'هذا العنصر غير موجود');
    }
}
