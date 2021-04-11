<?php

namespace App\Modules\Batch\Models;

use App\Traits\BatchScopes;
use App\Modules\Batch\Models\Batch;
use App\Modules\Country\Models\Country;
use Illuminate\Database\Eloquent\Model;

class BatchResell extends Model
{
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
    use BatchScopes;

    protected $guarded = ['id'];

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

}
