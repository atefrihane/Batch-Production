<?php
namespace App\Repositories;

use App\Contracts\QualityRepositoryInterface;
use App\Modules\Quality\Models\Quality;

class QualityRepository implements QualityRepositoryInterface
{

    public function fetchAll($type)
    {
        $filters = [

            'all' => Quality::all(),
        ];

        return $filters[$type];

    }

    public function fetchById($id)
    {
        return Quality::find($id);

    }
    public function store($country)
    {
        return Quality::create($country);

    }
    public function update($country)
    {

    }

}
