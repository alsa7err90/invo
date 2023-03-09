<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'divisions' => 'array',
        'created_at' => "datetime:Y-m-d H:m:s",
    ];
 
    public function meet()
    {
        return $this->hasMany(Meet::class);
    }
}
