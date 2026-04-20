<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayedList extends Model
{
    protected $fillable = ["author", "title", "length", "link"];
}
