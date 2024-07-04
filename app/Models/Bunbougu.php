<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bunbougu extends Model
{
    use HasFactory;

    //userとのリレーション関係
    public function user(){
        
        return $this->belongsTo(User::class);
    }

    public function juchus()
    {
        return $this->hasMany(Juchu::class, 'bunbougu_id');
    }
}
