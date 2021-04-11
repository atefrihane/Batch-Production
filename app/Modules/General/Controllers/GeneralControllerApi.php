<?php

namespace App\Modules\General\Controllers;

use App\Contracts\QualityRepositoryInterface;
use App\Contracts\StatisticRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralControllerApi extends Controller
{
    private $statistics, $qualities;
    public function __construct(StatisticRepositoryInterface $statistics, QualityRepositoryInterface $qualities)
    {
        $this->statistics = $statistics;
        $this->qualities = $qualities;
    }

    public function handleGetStatistics(Request $request)
    {

        $countryId = $request->country_id;
        $batchId = $request->batch_id;
        $qualityId = $request->quality_id;

        if (isset($countryId)) {

            return response()->json([
                'batches' => $this->statistics->fetchBatchesByCountry($countryId),
                'statistics' => $this->statistics->filterStatsByCountry($countryId),
            ], 200);
        }

        if (isset($qualityId) && isset($batchId)) {
            return response()->json([

                'statistics' => $this->statistics->filterStatsByQuality($qualityId, $batchId),
            ], 200);
        }

        if (isset($batchId)) {
            return response()->json([
              
                'statistics' => $this->statistics->filterStatsByBatch($batchId),
            ], 200);
        }

    }

}
