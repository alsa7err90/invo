<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SurnameStoreRequest;
use App\Interfaces\SurnameRepositoryInterface;
use App\Models\Surname;
use Illuminate\Http\Request;

class SurnameController extends Controller
{

    protected $surnameRepository;

    public function __construct(SurnameRepositoryInterface $surnameRepository)
    {
        $this->surnameRepository = $surnameRepository;
    }


    public function index()
    {
        $surnames = Surname::paginate(10);
        return   view('admin.surnames.index', compact('surnames'));
    }

    public function store(SurnameStoreRequest $request)
    {

        $invo =  $this->surnameRepository->store($request);
        $output =  $this->surnameRepository->getRow($invo);
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
        $invo = Surname::find($id);
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
        $invo = Surname::whereId($id)->first();

        $invo->update($request->only(
            'title',
            'lang'
        ));

        $output =  $this->surnameRepository->getRow($invo);
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
        $invo = Surname::find($id);
        if ($invo) {
            $invo->delete();
            return redirect()->back()->with('message', 'تم الحذف   ');
        } 
        return redirect()->back()->with('error2', 'هذا العنصر غير موجود');
    }
}
