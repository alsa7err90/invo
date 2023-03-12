<?php

namespace App\Repository;
 
use App\Interfaces\SurnameRepositoryInterface;
use App\Models\Surname;

class SurnameRepository implements SurnameRepositoryInterface
{
  public function store($request)
  {
    $surname = Surname::create($request->all());
    return $surname;
  }
 
  public function getRow($item)
  { 
    $output  = '<tr>' .
      '<td>' . $item->id . '</td>' .
      '<td>' . $item->title . '</td>' .
      '<td>' . getStatusLang($item->lang) . '</td>' .
      '<td><input type="checkbox"></td>' .
      '<td> '.view('components.buttons.edit', [
        'target' => 'modal_edit_surname',
        'id' => $item->id,
        'url' => route('surnames.edit', $item->id),
        'modal' => 'editSurname'
      ]) .view('components.buttons.delete', ['target' => 'deleteModal', 'url' => route('surnames.destroy', $item->id)]) .
      '</td>' .
      '</tr>';
    return $output;
  }
}  