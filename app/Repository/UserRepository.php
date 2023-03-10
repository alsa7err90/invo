<?php

namespace App\Repository;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

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
        return $user->update();
           
        
    }
}
