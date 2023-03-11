<?php

namespace App\Repository;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Hash;

class UserRepository implements UserRepositoryInterface
{

    public function  checkMatch($val, $val2)
    {
        if ($val === $val2) {
            return true;
        }
        return false;
    }
    public function update($request, $user_id)
    {   
        $user = User::find($user_id);
        $user->nickname = $request->nickname;
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->email = $request->email;
        if($user->update()){
            return true;
        }
        return false;
    }
    public function store($request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $name =  substr($input['email'], 0, strpos($input['email'], "@"));

        $input['name'] = $name . '_' . quickRandom(5);
        return User::create($input);
    }


    public function getRow($name)
    {
        $output  = '<tr>' .
            '<td>' . $name->id . '</td>' .
            '<td>' . $name->nickname . '</td>' .
            '<td>' .  $name->email . '</td>' .
            '<td><input type="checkbox"></td>' .
            '<td> <a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i
                class="material-icons">&#xe3c9;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                class="material-icons">&#xE5C9;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"> الصلاحيات</a>
                </td>' .
            '</tr>';
        return $output;
    }
}
