<?php
namespace App\Repositories;

use App\Contracts\BatchRepositoryInterface;
use App\Contracts\QualityRepositoryInterface;
use App\Contracts\StatisticRepositoryInterface;
use App\Modules\Batch\Models\Batch;
use Illuminate\Support\Facades\DB;

class StatisticRepository implements StatisticRepositoryInterface
{
    private $batches, $qualities;
    public function __construct(BatchRepositoryInterface $batches, QualityRepositoryInterface $qualities)
    {
        $this->batches = $batches;
        $this->qualities = $qualities;

    }
    public function getQualities()
    {
        return $this->qualities->fetchAll('all');
    }

    public function fetchBatchesByCountry($countryId)
    {
        return $this->batches->fetchByCountry($countryId);
    }
    public function getStats()
    {
        //COALESCE will cast null values as 0
        return Batch::statistics()
            ->selectRaw("COALESCE( SUM(case when step =1 then weight end ),0) as stepOneWeights ")
            ->selectRaw("COALESCE( SUM(case when step =2 then weight end ),0) as stepTwoWeights ")
            ->selectRaw("COALESCE( SUM(case when step =3  then weight end ),0) as stepThreeWeights ")

            ->first();

    }
    public function filterStatsByCountry($id)
    {
        return Batch::statistics()
            ->where('country_id', $id)
            ->first();

    }

    public function filterStatsByBatch($id)
    {
        $checkBatch = $this->batches->fetchById($id);
        if (!$checkBatch) {
            return false;

        }

        // get children ids

        $ids = $checkBatch->descendantsAndSelf->pluck('id');

        return Batch::statistics()
            ->whereIn('batches.id', $ids)
            ->first();

    }

    public function filterStatsByQuality($quality_id, $batch_id)
    {
        $pluckIds = [];
        isset($batch_id) ? $pluckIds = $this->batches->getChildrenIds($batch_id) : '';

        return DB::table('batches')
            ->when(!empty($pluckIds), function ($querySubItems) use ($pluckIds) {

                $querySubItems->whereIn('batches.id', $pluckIds);
            })
            ->whereNotNull('parent_id')
            ->leftJoin('seasons', 'batches.season_id', '=', 'seasons.id')

            ->selectRaw("COALESCE( SUM(case when season_id IS NOT NULL  THEN  weight  END ),0) AS totalWeights")
            ->selectRaw("COALESCE( SUM(case when seasons.name = 'summer' and batches.quality_id = '$quality_id' THEN weight  END ),0) AS totalSummerWeights")
            ->selectRaw("COALESCE( SUM(case when seasons.name = 'winter'and batches.quality_id = '$quality_id' THEN weight  END ),0) AS totalWinterWeights")
            ->selectRaw("COALESCE( SUM(case when seasons.name = 'spring'and batches.quality_id = '$quality_id' THEN weight  END ),0) AS totalSpringWeights")
            ->selectRaw("COALESCE( SUM(case when seasons.name = 'autumn'and batches.quality_id = '$quality_id' THEN weight  END ),0) AS totalAutumnWeights")
            ->selectRaw("COALESCE( 100 * SUM(CASE when  seasons.name = 'summer' and batches.quality_id = '$quality_id'  THEN weight  END) / SUM( CASE WHEN season_id IS NOT NULL THEN weight END ),0) AS summerClothesPercentage")
            ->selectRaw("COALESCE( 100 * SUM(CASE when  seasons.name = 'winter' and batches.quality_id = '$quality_id'  THEN weight  END) / SUM( CASE WHEN season_id IS NOT NULL THEN weight END ),0) AS winterClothesPercentage")
            ->selectRaw("COALESCE( 100 * SUM(CASE when  seasons.name = 'spring' and batches.quality_id = '$quality_id'  THEN weight  END) / SUM( CASE WHEN season_id IS NOT NULL THEN weight END ),0) AS springClothesPercentage")
            ->selectRaw("COALESCE( 100 * SUM(CASE when  seasons.name = 'autumn' and batches.quality_id = '$quality_id'  THEN weight  END) / SUM( CASE WHEN season_id IS NOT NULL THEN weight END ),0) AS autumnClothesPercentage")

            ->first();
    }

}
