<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FutureImage extends Model
{
    use HasFactory;
        protected $fillable=['image','future_id'];
    public function futer(){
        return $this->belongsTo(Future::class);

    }
   
}
