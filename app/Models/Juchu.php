<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juchu extends Model
{
    use HasFactory;

    //kyakusakiとのリレーション関係
    public function kyakusaki(){

        return $this->belongsTo(Kyakusaki::class);
    }

    //bunbouguとのリレーション関係
    public function bunbougu(){

        return $this->belongsTo(Bunbougu::class);
    }

    //userとのリレーション関係
    public function user(){

        return $this->belongsTo(User::class);
    }
}
