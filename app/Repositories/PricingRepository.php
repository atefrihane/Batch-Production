<?php
namespace App\Repositories;

use App\Contracts\PricingRepositoryInterface;
use App\Modules\Pricing\Models\Pricing;

class PricingRepository implements PricingRepositoryInterface
{

    public function fetchAll($type)
    {
        return [
            'all' => Pricing::all(),
        ][$type];

    }

    public function fetchById($id)
    {
        return Pricing::find($id);

    }

    public function update($user)
    {

    }

    public function delete($id)
    {

    }

}
