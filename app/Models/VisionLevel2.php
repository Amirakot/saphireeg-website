<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionLevel2 extends Model
{
    use HasFactory;
      protected $fillable=['title','description','version_level1_id'];
    // public function user(){
    //     return $this->belongsTo(User::class);

    // }
     public function versionlevel1(){
        return $this->belongsTo(VisionLevel1::class,'version_level1_id');
    }
}
