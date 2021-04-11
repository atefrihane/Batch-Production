<?php

namespace App\Modules\Category\Models;

use App\Modules\Batch\Models\Batch;
use App\Modules\Pricing\Models\Pricing;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = ['id'];

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('name', 'like', '%' . $value . '%');
    }

    public function batches()
    {
        return $this->belongsToMany(Batch::class, 'batch_category');
    }
    public function pricings()
    {
        return $this->hasMany(Pricing::class);
    }

    public function children()
    {
        return $this->hasMany($this, 'parent_id', 'id');
    }
}
