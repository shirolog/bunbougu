<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bunrui;

class Bunbougu extends Model
{
    use HasFactory;

    protected $table = 'bunbougus';

    //userとのリレーション関係
    public function user(){
        
        return $this->belongsTo(User::class);
    }

    //bunriとのリレーション関係
    public function bunrui(){

        return $this->belongsTo(Bunrui::class);
    }
    
    
}
