<?php

namespace App\Modules\Pricing\Models;

use App\Modules\Category\Models\Category;
use App\Modules\Quality\Models\Quality;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{

    protected $guarded = ['id'];

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('name', 'like', '%' . $value . '%')
            ->Orwhere('category_id', 'like', '%' . $value . '%')
            ->Orwhere('quality_id', 'like', '%' . $value . '%')
            ->Orwhere('price', 'like', '%' . $value . '%')
        ;

    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function quality()
    {
        return $this->belongsTo(Quality::class, 'quality_id');
    }

}
