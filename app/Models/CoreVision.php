<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreVision extends Model
{
    use HasFactory;
       protected $fillable=['title','description','user_id','vision_level1_id'];
    public function user(){
        return $this->belongsTo(User::class);

    }

     public function versionlevel1(){
        return $this->belongsTo(VisionLevel1::class,'vision_level1_id');
    }


}
