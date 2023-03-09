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
 
  public function getRow($name)
  { 
    $output  = '<tr>' .
      '<td>' . $name->id . '</td>' .
      '<td>' . $name->title . '</td>' .
      '<td>' . getStatusLang($name->lang) . '</td>' .
      '<td><input type="checkbox"></td>' .
      '<td><a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i class="material-icons">&#xe3c9;</i></a> <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a> </td>' .
      '</tr>';
    return $output;
  }
}
