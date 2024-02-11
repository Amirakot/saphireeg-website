<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FutureLevel1 extends Model
{
    use HasFactory;
        protected $fillable=['title','description','future_id'];
    public function future(){
        return $this->belongsTo(Future::class,'future_id');

    }

}
