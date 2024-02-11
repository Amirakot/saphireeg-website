<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutLevel1 extends Model
{
    use HasFactory;
     protected $fillable=['title','description','image','about_id'];
    public function aboutlevel2(){
        return $this->hasMany(AboutLevel2::class,'about_level1_id');

    }
     public function about(){
        return $this->belongsTo(About::class);
    }
       public function aboutheaderimage(){
        return $this->hasMany(AboutHeaderImage::class);
    }

}
