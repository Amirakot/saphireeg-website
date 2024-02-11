<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionLevel1Image extends Model
{
    use HasFactory;
protected $fillable=['image','vision_level1_id']
;
 public function visionlevel1(){
        return $this->belongsTo(VisionLevel1::class,'vision_level1_id');

    }
}
