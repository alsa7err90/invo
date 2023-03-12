<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\TableRepositoryInterface;
use App\Models\HistTable;
use App\Models\Permission;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class TableController extends Controller
{

    protected $tableRepository;

    public function __construct(TableRepositoryInterface $tableRepository)
    {
        $this->tableRepository = $tableRepository;
    }
    public function index()
    {
        $tables = Table::paginate(env('PAGINATE'));
        return   view('admin.tables.index', compact('tables'));
    }


    public function store(Request $request)
    {
        $table = $this->tableRepository->store($request);
        $output = $this->tableRepository->getRow($table);
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
        $check = chechPermission('history');
        if (!$check) return "ليس لديك الصلاحية لمشاهدة هذا المورد. ";
        $invo = HistTable::where('table_id', $id)->get();
        $output =  $this->tableRepository->getTable($invo);
        return $output;
    }

    public function edit($id)
    {
        $invo = Table::find($id);
        return  response()->json($invo);
    }

    public function update(Request $request, $id)
    {
         $check = chechPermission('set_chairs');
        if (!$check) return Response::json(['error' => "ليس لديك الصلاحية للتعديل على  هذا المورد. "], 403);
         
       
        $table = $this->tableRepository->update($request, $id);
        $table = Table::whereId($id)->first();
        $output =  $this->tableRepository->getRow($table);
        return  $output;
    }

    public function destroy($id)
    {
        $invo = Table::find($id);
        if ($invo) {
            $invo->delete();
            return redirect()->back()->with('message', 'تم الحذف   ');
        }

        return redirect()->back()->with('error2', 'هذا العنصر غير موجود');
    }

    public function empty()
    {
        $tables = Table::whereNull('invitation')->paginate(10);
        return view('admin.tables.index', compact('tables'));
    }


    public function report()
    {
        
    }
}
