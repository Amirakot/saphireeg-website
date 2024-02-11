<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionLevel1 extends Model
{
    use HasFactory;
      protected $fillable=['title','description','image','version_id'];
    public function visionlevel2(){
        return $this->hasMany(VisionLevel2::class,'version_level1_id');

    }
     public function vision(){
        return $this->belongsTo(Vision::class,'version_id');
    }
     public function visionimage(){
        return $this->hasMany(VisionLevel1Image::class,'vision_level1_id');

    }
       public function visionheader(){
        return $this->hasMany(VisionHeaderImage::class,'version_level1_id');

    }
      public function corevision(){
        return $this->hasMany(CoreVision::class,'vision_level1_id');

    }
    // version_level1_id
}
