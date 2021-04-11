<?php

namespace App\Modules\Season\Controllers;

use App\Contracts\SeasonRepositoryInterface;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{
    private $seasons;
    public function __construct(SeasonRepositoryInterface $seasons)
    {
        $this->seasons = $seasons;

    }

    public function showUpdateSeason($id)
    {
        $checkSeason = $this->seasons->fetchById($id);
        if ($checkSeason) {
            return view('Season::showUpdateSeason', ['season' => $checkSeason]);
        }
        return view('showNotFound');
    }
}
