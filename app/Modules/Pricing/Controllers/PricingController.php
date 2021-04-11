<?php

namespace App\Modules\Pricing\Controllers;

use App\Contracts\PricingRepositoryInterface;
use App\Http\Controllers\Controller;

class PricingController extends Controller
{
    private $pricings;
    public function __construct(PricingRepositoryInterface $pricings)
    {
        $this->pricings = $pricings;
    }

    public function showUpdatePricing($id)
    {
        $checkPricing = $this->pricings->fetchById($id);
        if ($checkPricing) {
            return view('Pricing::showUpdatePricing', ['pricing' => $checkPricing]);
        }
        return view('showNotFound');

    }
}
