<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission_name)
    {
        $permission_id = Permission::where('permission_name',$permission_name)->first()->id;
        $rel =  DB::table('permission_user')->where('permission_id',$permission_id)->where('user_id',auth()->user()->id)->count();
         if($rel == 1){
            return $next($request);
         }
         abort(403);

    }
}
