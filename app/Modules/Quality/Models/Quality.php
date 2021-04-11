<?php

namespace App\Modules\Quality\Models;

use App\Modules\Pricing\Models\Pricing;
use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{

    protected $guarded = ['id'];
    public function scopeSearch($query, $value)
    {
        return $query
            ->where('name', 'like', '%' . $value . '%')

        ;

    }
    public function pricings()
    {
        return $this->hasMany(Pricing::class);
    }
}
