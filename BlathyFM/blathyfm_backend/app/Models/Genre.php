<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['genre'];

    public function music(){
        return $this->hasMany(Music::class);
    }
}
