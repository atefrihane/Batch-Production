<?php

namespace App\Traits;

trait BatchScopes
{

    public function scopeSearch($query, $value)
    {

        return $query

            ->where('name', 'like', '%' . $value . '%')
            ->orWhere('id', $value)
            ->Orwhere('description', 'like', '%' . $value . '%')
            ->Orwhere('weight', 'like', '%' . $value . '%')
            ->orWhereHas('country', function ($queryCountry) use ($value) {
                $queryCountry->where('name', 'like', '%' . $value . '%');
            })
            ->orWhereHas('quality', function ($queryQuality) use ($value) {
                $queryQuality->where('name', 'like', '%' . $value . '%');
            })
            ->orWhereHas('categories', function ($queryCategories) use ($value) {
                $queryCategories->where('name', 'like', '%' . $value . '%');
            })
            ->orWhereHas('season', function ($querySeason) use ($value) {
                $querySeason->where('name', 'like', '%' . $value . '%');
            });
    }

    public function scopeFirstStep($query)
    {

        return $query
            ->whereStep(1)
            ->whereStatus(1);
    }

    public function scopeSecondStep($query)
    {

        return $query
            ->whereStep(2)
            ->whereStatus(1);
    }

    public function scopeThirdStep($query)
    {

        return $query
            ->whereStep(3)
            ->whereStatus(1);
    }

    public function scopeExtra($query)
    {

        return $query
            ->whereNull(['parent_id', 'country_id'])
            ->whereNotNull(['season_id', 'category_id', 'quality_id', 'pricing_id'])
            ->whereStatus(1);
    }

    public function scopeReselled($query)
    {

        return $query
            ->whereNotNull('country_id')
            ->whereNull(['parent_id', 'season_id', 'quality_id', 'pricing_id'])
            ->whereStatus(0);
    }

    public function scopeStatistics($query)
    {

        return $query
            ->leftJoin('seasons', 'batches.season_id', '=', 'seasons.id')
            ->selectRaw("COALESCE( SUM(weight),0) AS totalWeights")
            ->selectRaw("COALESCE( SUM(case when step=3 and seasons.name = 'summer' THEN weight  END ),0) AS totalSummerWeights")
            ->selectRaw("COALESCE( SUM(case when step=3 and seasons.name = 'winter' THEN weight  END ),0) AS totalWinterWeights")
            ->selectRaw("COALESCE( SUM(case when step=3 and seasons.name = 'spring' THEN weight  END ),0) AS totalSpringWeights")
            ->selectRaw("COALESCE( SUM(case when step=3 and seasons.name = 'autumn' THEN weight  END ),0) AS totalAutumnWeights")
            ->selectRaw("COALESCE( 100 * SUM(case when step=3 and seasons.name = 'summer' THEN weight  END ) / SUM(weight) ,0) AS summerClothesPercentage")
            ->selectRaw("COALESCE( 100 * SUM(case when step=3 and seasons.name = 'winter' THEN weight  END ) / SUM(weight) ,0) AS winterClothesPercentage")
            ->selectRaw("COALESCE( 100 * SUM(case when step=3 and seasons.name = 'spring' THEN weight  END ) / SUM(weight) ,0) AS springClothesPercentage")
            ->selectRaw("COALESCE( 100 * SUM(case when step=3 and seasons.name = 'autumn' THEN weight  END ) / SUM(weight) ,0) AS autumnClothesPercentage");
    }
}
