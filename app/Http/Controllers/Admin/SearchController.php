<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchAttentions(Request $request)
    { 
        $output = "";
        $invos = Invitation::where('is_attentions', 1);

        if ($request->name) $invos->where('name', 'LIKE', '%' . $request->name . "%");
        if ($request->email) $invos->where('email', 'LIKE', '%' . $request->email . "%");
        if ($request->mobile) $invos->where('mobile', 'LIKE', '%' . $request->mobile . "%");
        if($request->attend_confirm && $request->attend_confirm !==  2  ) $invos->where('attend_confirm', $request->attend_confirm);  
 
        $invoss =  $invos->get();
        if ($invoss->count() > 0) {
            foreach ($invoss as $invo) {
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
        return ($output);
    }

    
    public function searchPublic(Request $request)
    { 
        $output = "";
        $invos = Invitation::where('is_attentions', 0);

        if ($request->name) $invos->where('name', 'LIKE', '%' . $request->name . "%");
        if ($request->email) $invos->where('email', 'LIKE', '%' . $request->email . "%");
        if ($request->mobile) $invos->where('mobile', 'LIKE', '%' . $request->mobile . "%");
        if ($request->attend_confirm) $invos->where('attend_confirm', 'LIKE', '%' . $request->attend_confirm . "%");
        if ($request->is_out) $invos->where('is_out', 'LIKE', '%' . $request->is_out . "%");
         
        if($request->attend_confirm && $request->attend_confirm !==  2  ) $invos->where('attend_confirm', $request->attend_confirm);  
 
        $invoss =  $invos->get();
        if ($invoss->count() > 0) {
            foreach ($invoss as $invo) {
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
        return ($output);
    }
}
