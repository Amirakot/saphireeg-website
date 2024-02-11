<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Future extends Model
{
    use HasFactory;
       protected $fillable=['title','description','user_id'];
    public function futerlevel1(){
        return $this->hasMany(FutureLevel1::class,'future_id');

    }
     public function futureimage(){
        return $this->hasMany(FutureImage::class);

    }

}
