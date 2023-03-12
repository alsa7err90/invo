<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_ar','permission_name', 'permission_detail',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

}
