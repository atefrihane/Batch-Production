<?php

namespace App\Modules\Season\Models;

use App\Modules\Batch\Models\BatchItem;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{

    protected $guarded = ['id'];
    public function scopeSearch($query, $value)
    {
        return $query
            ->where('name', 'like', '%' . $value . '%')

        ;

    }

    public function items()
    {
        return $this->hasMany(BatchItem::class);
    }
}
