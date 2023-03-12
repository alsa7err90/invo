<?php

use App\Models\Group;
use App\Models\User;

function getNameGroupById($id){
  $group=  Group::whereId($id)->first(); 
  if($group){
    return $group->name;
  } 
}

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

function getUsernameById($id){
    if($id >0 ){
           $user=  User::whereId($id)->first(); 
           if($user){
             return $user->name;
           }
    }
 
}
