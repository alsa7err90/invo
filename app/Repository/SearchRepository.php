<?php

namespace App\Repository;

use App\Interfaces\SearchRepositoryInterface;
use App\Models\Invitation;
use App\Models\Table;

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
    if (isset($request->is_out)) $invos->where('is_out', $request->is_out);
    if (isset($request->group)) $invos->where('group', $request->group);
    if (isset($request->status)) $invos->where('status', $request->status);
    return    $invos->get();
  }


  public function searchAll($request)
  {
    $invos = Invitation::where('id', ">", 0);

    if ($request->name) $invos->where('name', 'LIKE', '%' . $request->name . "%");
    if ($request->email) $invos->where('email', 'LIKE', '%' . $request->email . "%");
    if ($request->mobile) $invos->where('mobile', 'LIKE', '%' . $request->mobile . "%");
    if (isset($request->is_out)) $invos->where('is_out', $request->is_out);
    if (isset($request->group)) $invos->where('group', $request->group);
    if (isset($request->status)) $invos->where('status', $request->status);
    if (isset($request->seattype)) $invos->where('seattype', $request->seattype);
    if (isset($request->is_attentions)) $invos->where('is_attentions', $request->is_attentions);
    return    $invos->get();
  }

  public function searchTable($request)
  {
    $invos = Table::where('id', ">", 0); 
    if ($request->code) $invos->where('code', 'LIKE', '%' . $request->code . "%");
    if (isset($request->type)) $invos->where('type', $request->type);
    if (isset($request->status)) $invos->where('status', $request->status);
    return    $invos->get();
  }


  public function getRowTable($invos)
  {
    $output = "";
    if ($invos->count() > 0) {
      foreach ($invos as $item) {
        $output  .= '<tr>' .
          '<td>' . $item->id . '</td>' .
          '<td>' . $item->code . '</td>' .
          '<td>' . getUsernameById($item->invitation) . '</td>' .
          '<td>' .  $item->type . '</td>' .
          '<td>' . getStatusTable($item->status) . '</td>' .
          '<td><input type="checkbox"></td>' .
          '<td> <a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i
          class="material-icons">&#xe3c9;</i></a>
          <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
          class="material-icons">&#xE5C9;</i></a>
          <a href="#" data-toggle="tooltip">
          سجل التغييرات
          </a></td>' .
          '</tr>';
      }
    } else {
      $output = "not found !";
    }

    return $output;
  }

  public function getRowAttentions($invos)
  {
    $output = "";
    if ($invos->count() > 0) {
      foreach ($invos as $item) {
        $output  .= '<tr>' .
          '<td>' . $item->id . '</td>' .
          '<td>' . $item->code . '</td>' .
          '<td>' . getUsernameById($item->invitation) . '</td>' .
          '<td>' .  $item->type . '</td>' .
          '<td>' . $item->email . '</td>' .
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
      foreach ($invos as $item) {
        $is_out = "";
        if ($item->is_out == 1) {
          $is_out = "خارجي";
        }
        $output  .= '<tr>' .
          '<td>' . $item->id . '</td>' .
          '<td>' . $item->created_at . '</td>' .
          '<td>' . $item->name . '</td>' .
          '<td>' . $item->mobile . '</td>' .
          '<td>' . $item->email . '</td>' .
          '<td>' . getStatus($item->status) . '</td>' .
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

  public function getRowAll($invos)
  {
    $output = "";
    if ($invos->count() > 0) {
      foreach ($invos as $item) {
        $output  .= '<tr>' .
          '<td>' . $item->id . '</td>' .
          '<td>' . $item->created_at . '</td>' .
          '<td>' . $item->name . '</td>' .
          '<td>' . $item->mobile . '</td>' .
          '<td>' . $item->email . '</td>' .
          '<td>' .  getStatusAttentions($item->is_attentions) . '</td>' .
          '<td>' . $item->seatcode . '</td>' .
          '<td>' . getNameGroupById($item->group_id) . '</td>' .
          '<td>' . getStatusAttend($item->attend) . '</td>' .
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
