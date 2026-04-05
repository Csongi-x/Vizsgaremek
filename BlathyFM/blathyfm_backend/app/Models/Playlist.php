<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlist';


    protected $fillable = ['order_number', 'author', 'title', 'length','link'];


}
