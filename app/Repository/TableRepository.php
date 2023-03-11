<?php

namespace App\Repository;

use App\Interfaces\TableRepositoryInterface;
use App\Models\Table;

class TableRepository implements TableRepositoryInterface
{
    public function store($request)
    {
        if ($request->hasFile('image')) {
            $request =   uploadImage($request);
        } else {
            $request =  $request->all();
        }
        return  Table::create($request);
    }


    public function getRow($invo)
    { 
        $output  = '<tr>' .
            '<td>' . $invo->id . '</td>' .
            '<td>' . $invo->code . '</td>' .
            '<td>' . $invo->invitation . '</td>' .
            '<td>' . $invo->type . '</td>' .
            '<td>' . getStatusTable($invo->status) . '</td>' .
            
            '<td><input type="checkbox"></td>' .
            '<td><a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i class="material-icons">&#xe3c9;</i></a> <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a> <a href="#" class="settings" title="استعراض" data-toggle="tooltip"><i class="material-icons">&#xe8b6;</i></a> <a href="#" class="settings" title="طباعة" data-toggle="tooltip"><i class="material-icons">&#xe8ad;</i></a><a href="#" class="settings" title="طباعة مع حلفية" data-toggle="tooltip"><iclass="material-icons text-success">&#xe8ad;</i></td>' .
            '</tr>';
        return $output;
    }

    public function update($request,$id)
    {
        if ($request->hasFile('image')) {
            $request =   uploadImage($request->except(['_token','_method']));
        } else {
            $request =  $request->except(['_token','_method']);
        }
        return  Table::whereId($id)->update($request);
    }
}
