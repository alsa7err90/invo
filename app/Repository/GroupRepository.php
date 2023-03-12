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

  public function getRow($item)
  {
    $output  = '<tr>' .
      '<td>' . $item->id . '</td>' .
      '<td><div style="width:15px;height:15px;background-color:' . $item->color . '"></div> </td>' .
      '<td>' .  $item->name . '</td>' .
      '<td><input type="checkbox"></td>' .
      '<td>' . view('components.buttons.edit', [
        'target' => 'modal_edit_group',
        'id' => $item->id,
        'url' => route('groups.edit', $item->id),
        'modal' => 'editGroup'
      ]) . view('components.buttons.delete', ['target' => 'deleteModal', 'url' => route('groups.destroy', $item->id)]) .
      ' </td>' .
      '</tr>';
    return $output;
  }
}
