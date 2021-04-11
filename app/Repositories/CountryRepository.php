<?php
namespace App\Repositories;

use App\Contracts\CountryRepositoryInterface;
use App\Modules\Country\Models\Country;

class CountryRepository implements CountryRepositoryInterface
{

    public function fetchAll($type)
    {
        $filters = [

            'all' => Country::all(),
        ];

        return $filters[$type];

    }

    public function fetchById($id)
    {
        return Country::find($id);

    }
    public function store($country)
    {
        return Country::create($country);

    }
    public function update($country)
    {

    }

}
