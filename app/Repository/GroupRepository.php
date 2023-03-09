<?php

namespace App\Repository;

use App\Interfaces\GroupRepositoryInterface;
use App\Models\Group;

class GroupRepository implements GroupRepositoryInterface
{
  public function store($request)
  {
    $surname = Group::create($request->all());
    return $surname;
  }
 
  public function getRow($name)
  { 
    $output  = '<tr>' .
      '<td>' . $name->id . '</td>' .
      '<td><div style="width:15px;height:15px;background-color:' . $name->color . '"></div> </td>' .
      '<td>' .  $name->name . '</td>' .
      '<td><input type="checkbox"></td>' .
      '<td><a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i class="material-icons">&#xe3c9;</i></a> <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a> </td>' .
      '</tr>';
    return $output;
  }
}
