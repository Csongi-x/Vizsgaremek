<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    public function genre() {
        return $this->belongsTo(Genre::class);
    }
}
