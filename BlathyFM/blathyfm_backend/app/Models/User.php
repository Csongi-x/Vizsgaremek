<?php

namespace App\Models;

    use App\Models\Role;
    use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['email', 'password', 'role'];
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
