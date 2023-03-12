<?php

use App\Models\Group;
use App\Models\Invitation;
use App\Models\User;

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
