<?php

namespace App\Modules\Batch\Models;

use App\Traits\BatchScopes;
use App\Modules\Season\Models\Season;
use App\Modules\Country\Models\Country;
use App\Modules\Pricing\Models\Pricing;
use App\Modules\Quality\Models\Quality;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Batch\Models\BatchResell;
use App\Modules\Category\Models\Category;

class Batch extends Model
{
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
    use BatchScopes;

    protected $guarded = ['id'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'batch_category');
    }

    public function quality()
    {
        return $this->belongsTo(Quality::class, 'quality_id');
    }

    public function pricing()
    {
        return $this->belongsTo(Pricing::class, 'pricing_id');
    }

    public function parent()
    {
        return $this->belongsTo($this, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany($this, 'parent_id', 'id');
    }
    public function resell()
    {
        return $this->hasOne(BatchResell::class);
    }
}
