<?php

namespace App\Repository;

use App\Interfaces\SearchRepositoryInterface;
use App\Models\Invitation;

class SearchRepository implements SearchRepositoryInterface
{
  public function searchAttentions($request)
  {
    $invos = Invitation::where('is_attentions', '1');
 
    if ($request->name) $invos->where('name', 'LIKE', '%' . $request->name . "%");
    if ($request->email) $invos->where('email', 'LIKE', '%' . $request->email . "%");
    if ($request->mobile) $invos->where('mobile', 'LIKE', '%' . $request->mobile . "%");
    if (isset($request->attend_confirm) && $request->attend_confirm !=  2) $invos->where('attend_confirm', $request->attend_confirm);

    return $invos->get();
  }
  public function searchPublic($request)
  {
    $invos = Invitation::where('is_attentions', '0');

        if ($request->name) $invos->where('name', 'LIKE', '%' . $request->name . "%");
        if ($request->email) $invos->where('email', 'LIKE', '%' . $request->email . "%");
        if ($request->mobile) $invos->where('mobile', 'LIKE', '%' . $request->mobile . "%");
        if (isset($request->is_out)) $invos->where('is_out',$request->is_out); 
        if (isset($request->group)) $invos->where('group', $request->group); 
        if(isset($request->status)) $invos->where('status', $request->status);   
       return    $invos->get(); 
  }

  public function getRowAttentions($invos)
  {
    $output = "";
    if ($invos->count() > 0) {
      foreach ($invos as $invo) {
        $output  .= '<tr>' .
          '<td>' . $invo->id . '</td>' .
          '<td>' . $invo->created_at . '</td>' .
          '<td>' . $invo->name . '</td>' .
          '<td>' . $invo->mobile . '</td>' .
          '<td>' . $invo->email . '</td>' .
          '<td><input type="checkbox"></td>' .
          '<td><a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i class="material-icons">&#xe3c9;</i></a> <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a> <a href="#" class="settings" title="استعراض" data-toggle="tooltip"><i class="material-icons">&#xe8b6;</i></a> <a href="#" class="settings" title="طباعة" data-toggle="tooltip"><i class="material-icons">&#xe8ad;</i></a><a href="#" class="settings" title="طباعة مع حلفية" data-toggle="tooltip"><iclass="material-icons text-success">&#xe8ad;</i></td>' .
          '</tr>';
      }
    } else {
      $output = "not found !";
    }

    return $output;
  }

  public function getRowPublic($invos)
  {
    $output = "";
    if ($invos->count() > 0) {
        foreach ($invos as $invo) {
            $is_out = "";
            if ($invo->is_out == 1) {
                $is_out = "خارجي";
            }
            $output  .= '<tr>' .
                '<td>' . $invo->id . '</td>' .
                '<td>' . $invo->created_at . '</td>' .
                '<td>' . $invo->name . '</td>' .
                '<td>' . $invo->mobile . '</td>' .
                '<td>' . $invo->email . '</td>' .
                '<td>' . getStatus($invo->status) . '</td>' .
                '<td>' .  $is_out . '</td>' .
                '<td><input type="checkbox"></td>' .
                '<td><a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i class="material-icons">&#xe3c9;</i></a> <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a> <a href="#" class="settings" title="استعراض" data-toggle="tooltip"><i class="material-icons">&#xe8b6;</i></a> <a href="#" class="settings" title="طباعة" data-toggle="tooltip"><i class="material-icons">&#xe8ad;</i></a><a href="#" class="settings" title="طباعة مع حلفية" data-toggle="tooltip"><iclass="material-icons text-success">&#xe8ad;</i></td>' .
                '</tr>';
        }
    } else {
        $output = "not found !";
    }
    return $output;
  }
}
