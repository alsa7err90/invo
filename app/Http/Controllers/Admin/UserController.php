<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = User::paginate(env('PAGINATE'));
        return view('admin.profile.index', compact('users'));
    }


    public function store(NewUserRequest $request)
    {
        $user =  $this->userRepository->store($request);
        $output =  $this->userRepository->getRow($user);
        return  $output;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $invo = User::find($id);
        return  response()->json($invo);
    }

    public function update(Request $request, $id)
    {
        $checkPassword = $this->userRepository->checkMatch($request->password, $request->password2);
        if (!$checkPassword)   return response()->json(['error' => 'كلمات المرور غير متطابقة '], 404); // Status code here

        $invo = User::whereId($id)->first();
        $update = $this->userRepository->update($request, $id);
        if ($update) { 
            $invo = User::whereId($id)->first();
            $output =  $this->userRepository->getRow($invo);
            return  $output;
        }
        return response()->json(['error' => 'Error msg'], 404); // Status code here

    }

    public function destroy($id)
    {
        $invo = User::find($id);
        if ($invo) {
            $invo->delete();
            return redirect()->back()->with('message', 'تم الحذف   ');
        } 
        return redirect()->back()->with('error2', 'هذا العنصر غير موجود');
    }


    public function myProfile()
    {
        return view('admin.profile.myprofile');
    }

    public function updateMyProfile(UpdateUserRequest $request)
    {

        $checkPassword = $this->userRepository->checkMatch($request->password, $request->password2);
        if (!$checkPassword)  return redirect()->back()->with('error2', "كلمات السر غير متطابقة");

        $checkEmail = $this->userRepository->checkMatch($request->password, $request->password2);
        if (!$checkEmail)  return redirect()->back()->with('error2', "الايميلات  غير متطابقة");

        $update = $this->userRepository->update($request, auth()->user()->id);
        if ($update) {
            return redirect()->back()->with('message', 'تم حفظ الملف الشخصي بنجاح');
        }
        return redirect()->back()->with('message', 'حدث خطأ غير متوقع ');
    }
}
