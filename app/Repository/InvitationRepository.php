<?php

namespace App\Repository;

use App\Interfaces\InvitationRepositoryInterface;
use App\Models\Invitation; 
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InvitationRepository implements InvitationRepositoryInterface
{
  public function storeAttentions($request)
  {
    $meet_id = 1;
    $request->request->add(['meet_id' => $meet_id]);
    $request->request->add(['is_attentions' => '1']);

    $invo = Invitation::create($request->all());
    return $invo;
  }

  public function storePublic($request)
  {
    $meet_id = 1;
    $request->request->add(['meet_id' => $meet_id]);
    $invo = Invitation::create($request->except(['send_email_with_change']));
    return $invo;
  }

  public function getRow($invo)
  {

    $is_out = "";
    if ($invo->is_out == 1) {
      $is_out = "خارجي";
    }
    $output  = '<tr>' .
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
    return $output;
  }

  public function getTable($invo)
  {
    $qrcode = QrCode::size(75)->generate($invo->id);
    $output  =   '<tr>' .
      '<td>QrCode</td>' .
      '<td>' . $qrcode . '</td>' .
      '</tr>' .
      '<tr>' .
      '<td>الاسم</td>' .
      '<td>' . $invo->name . '</td>' .
      '</tr>' .
      '<tr>' .
      '<td>الجوال</td>' .
      '<td>' . $invo->mobile . '</td>' .
      '</tr>' .
      '<tr>' .
      '<td>البريد الالكتروني</td>' .
      '<td>' . $invo->email . '</td>' .
      '</tr>' .
      '<tr>' .
      '<td>الجهة التابع لها</td>' .
      '<td>' . $invo->side . '</td>' .
      '</tr>' .
      '<td> المنصب</td>' .
      '<td>' . $invo->position . '</td>' .
      '</tr>';
    return $output;
  }
}
