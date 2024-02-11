<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutHeaderImage extends Model
{
    use HasFactory;
    protected $fillable=['image','about_level1_id'];
    public function aboutlevel1(){
        return $this->belongsTo(AboutLevel1::class,'about_level1_id');
    }
}
