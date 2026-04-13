<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcceptableMusic extends Model
{
    protected $fillable = ['author', 'title', 'length', 'link'];
}
