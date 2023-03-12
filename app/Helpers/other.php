<?php

use App\Models\Group;
use App\Models\Invitation;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;

// 1 - getNameGroupById
// 2 - uploadImage
// 3 - getUsernameById

// 1
function getNameGroupById($id){
  $group=  Group::whereId($id)->first(); 
  if($group){
    return $group->name;
  } 
}
// 2
function uploadImage($request)
{
   
  $path_img = 'uploads';
  $rand = quickRandom(8);
  $fileName = $rand . '_' . time() . '.' . $request->image->extension();
  $request->image->move(public_path($path_img), $fileName);
  $data = $request->all(); 
  $data['image'] = $fileName;
   
  return $data;
}

// 3
function getUsernameById($id){
    if($id){
        return   $user=  Invitation::whereId($id)->first()->name;  
    } 
}

function chechPermission($permission_name){
  
  $permission_id = Permission::where('permission_name','history')->first()->id;
  $rel =  DB::table('permission_user')->where('permission_id',$permission_id)->where('user_id',auth()->user()->id)->count();
   if($rel == 1){
      return true;
   }
   return false;
}