<?php

namespace App\Modules\Role\Models;

use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $guarded = ['id'];

    public function users()
    {
        $this->hasMany(User::class);
    }

}
