<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestedMusic extends Model
{
    protected $fillable = ['email', 'author', 'title', 'length','link'];
}
