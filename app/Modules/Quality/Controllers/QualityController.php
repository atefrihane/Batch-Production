<?php

namespace App\Modules\Quality\Controllers;

use App\Http\Controllers\Controller;
use App\Contracts\QualityRepositoryInterface;

class QualityController extends Controller
{
    private $qualities;
    public function __construct(QualityRepositoryInterface $qualities)
    {
        $this->qualities = $qualities;

    }

    public function showUpdateQuality($id)
    {
        $checkQuality = $this->qualities->fetchById($id);
        if ($checkQuality) {
            return view('Quality::showUpdateQuality', ['quality' => $checkQuality]);
        }
        return view('showNotFound');

    }
}
