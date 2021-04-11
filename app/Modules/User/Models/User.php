<?php

namespace App\Modules\User\Models;

use App\Modules\Role\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];
    protected $with = ['role'];

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('first_name', 'like', '%' . $value . '%')
            ->Orwhere('last_name', 'like', '%' . $value . '%')
        ;

    }

    public function formatName()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function isAdmin()
    {
        return $this->role->name == 'superadmin';
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}
