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


    public function getRow($item)
    {
        $output  = '<tr>' .
            '<td>' . $item->id . '</td>' .
            '<td>' . $item->code . '</td>' .
            '<td>' . getUsernameById($item->invitation) . '</td>' .
            '<td>' . $item->type . '</td>' .
            '<td>' . getStatusTable($item->status) . '</td>' .

            '<td><input type="checkbox"></td>' .
            '<td>' . view('components.buttons.edit', [
                'target' => 'modal_edit_table',
                'id' => $item->id,
                'url' => route('tables.edit', $item->id),
                'modal' => 'editTable'
            ]) . view('components.buttons.delete', ['target' => 'deleteModal', 'url' => route('tables.destroy', $item->id)]) . '</td>' .
            '</tr>';
        return $output;
    }




    public function update($request, $id)
    {
        if ($request->hasFile('image')) {
            $request =   uploadImage($request->except(['_token', '_method']));
        } else {
            $request =  $request->except(['_token', '_method']);
        }
        return  Table::whereId($id)->update($request);
    }
}
