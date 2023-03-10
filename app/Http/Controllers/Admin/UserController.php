<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Interfaces\UserRepositoryInterface;
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
        //
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
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
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
