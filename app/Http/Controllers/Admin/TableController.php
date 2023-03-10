<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\TableRepositoryInterface;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    
    protected $tableRepository;

    public function __construct(TableRepositoryInterface $tableRepository)
    {
        $this->tableRepository = $tableRepository; 
    } 
    public function index()
    {
        $tables = Table::paginate(10);
        return   view('admin.tables.index',compact('tables'));
    }

     
    public function store(Request $request)
    {
        $table = $this->tableRepository->store($request);
        $output = $this->tableRepository->getRow($table); 
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

    public function empty()
    {
        $tables = Table::whereNull('invitation')->paginate(10);
        return view('admin.tables.index',compact('tables'));
    }
    

    public function report()
    {
        //
    }
}
