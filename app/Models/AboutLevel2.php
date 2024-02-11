<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutLevel2 extends Model
{
    use HasFactory;

      protected $fillable=['title','description','image','about_level1_id'];
    public function aboutlevel1(){
        return $this->belongsTo(AboutLevel1::class,'about_level1_id');

    }
    //  public function about(){
    //     return $this->belongsTo(AboutLevel1::class);
    // }
}
