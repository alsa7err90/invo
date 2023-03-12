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
        if ($user->update()) {
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


    public function getRow($item)
    {
        $output  = '<tr>' .
            '<td>' . $item->id . '</td>' .
            '<td>' . $item->nickname . '</td>' .
            '<td>' .  $item->email . '</td>' .
            '<td><input type="checkbox"></td>' .
            '<td> ' . view('components.buttons.edit', [
                'target' => 'modal_edit_user',
                'id' => $item->id,
                'url' => route('users.edit', $item->id),
                'modal' => 'editUser'
            ]) . view('components.buttons.delete', ['target' => 'deleteModal', 'url' => route('users.destroy', $item->id)]) . '</td>' .
            view('components.buttons.permission', ['target' => 'deleteModal', 'url' => route('users.destroy', $item->id)]) . '</td>' .'</tr>';
        return $output;
    }
}
