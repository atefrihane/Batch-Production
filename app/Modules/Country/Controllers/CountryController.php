<?php

namespace App\Modules\Country\Controllers;

use App\Contracts\CountryRepositoryInterface;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    private $countries;
    public function __construct(CountryRepositoryInterface $countries)
    {
        $this->countries = $countries;

    }
    public function showUpdateCountry($id)
    {
        $checkCountry = $this->countries->fetchById($id);
        if ($checkCountry) {
            return view('Country::showUpdateCountry', ['country' => $checkCountry]);
        }
        return view('showNotFound');
    }

}
