<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = ['author', 'title', 'length','link', 'genre'];
    public function genre() {
        return $this->belongsTo(Genre::class);
    }
}
