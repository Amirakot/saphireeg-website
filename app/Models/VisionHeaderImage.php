<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionHeaderImage extends Model
{
    use HasFactory;
     protected $fillable=['image','version_level1_id'];
    // public function user(){
    //     return $this->belongsTo(User::class);

    // }
     public function visionlevel1(){
        return $this->belongsTo(visionlevel1::class,'version_level1_id');

    }
}
