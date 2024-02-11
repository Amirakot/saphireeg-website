<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    use HasFactory;
      protected $fillable=['title','description','image'];
    public function user(){
        return $this->belongsTo(User::class);

    }
     public function visionlevel1(){
        return $this->hasMany(VisionLevel1::class,'version_id');
    }
}
