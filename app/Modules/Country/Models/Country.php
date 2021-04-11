<?php

namespace App\Modules\Country\Models;

use App\Modules\Batch\Models\Batch;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $guarded = ['id'];

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('name', 'like', '%' . $value . '%')

        ;

    }

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

}
