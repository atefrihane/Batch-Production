<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Contracts\CountryRepositoryInterface;
use App\Contracts\StatisticRepositoryInterface;

class ShowStatistics extends Component
{
    public $stepOneWeights;
    public $stepTwoWeights;
    public $stepThreeWeights;
    public $stepFourWeights;
    public $totalWeights;
    public $totalSummerWeights;
    public $totalWinterWeights;
    public $totalSpringWeights;
    public $totalAutumnWeights;
    public $summerClothesPercentage;
    public $winterClothesPercentage;
    public $springClothesPercentage;
    public $autumnClothesPercentage;
    public $dbExecutionTime;

    public $countries = [];
    public $batches = [];
    public $qualities = [];
    public $country_id = '';
    public $batch_id = '';
    public $quality_id = '';
    private $statisticRepository;

    public function mount(StatisticRepositoryInterface $statisticRepository, CountryRepositoryInterface $countryRepository)
    {

        $this->statisticRepository = $statisticRepository->getStats();

        $this->stepOneWeights = $this->statisticRepository->stepOneWeights;
        $this->stepTwoWeights = $this->statisticRepository->stepTwoWeights;
        $this->stepThreeWeights = $this->statisticRepository->stepThreeWeights;
        $this->stepFourWeights = $this->statisticRepository->stepFourWeights;
        $this->totalWeights = $this->statisticRepository->totalWeights;
        $this->totalSummerWeights = $this->statisticRepository->totalSummerWeights;
        $this->totalWinterWeights = $this->statisticRepository->totalWinterWeights;
        $this->totalSpringWeights = $this->statisticRepository->totalSpringWeights;
        $this->totalAutumnWeights = $this->statisticRepository->totalAutumnWeights;
        $this->summerClothesPercentage = $this->statisticRepository->summerClothesPercentage;
        $this->winterClothesPercentage = $this->statisticRepository->winterClothesPercentage;
        $this->springClothesPercentage = $this->statisticRepository->springClothesPercentage;
        $this->autumnClothesPercentage = $this->statisticRepository->autumnClothesPercentage;
        $this->countries = $countryRepository->fetchAll('all');

    }
    public function render()
    {

        return view('livewire.show-statistics');
    }

    public function handleLoadBatches(StatisticRepositoryInterface $statisticRepository, $country_id)
    {
        DB::listen(function($query) {
            $this->dbExecutionTime = $query->time;
        });
        $this->qualities = [];
        /**fetch batches attached to a specific country **/
        $this->batches = $statisticRepository->fetchBatchesByCountry($country_id);
        /**fetch statistics by country **/
        $statsByCountry = $statisticRepository->filterStatsByCountry($country_id);
        $this->updateStatsitics($statsByCountry);

    }

    public function handleFilterBatches(StatisticRepositoryInterface $statisticRepository, $batch_id)
    {
        /**fetch statistics by batch **/
        $statsByBatch = $statisticRepository->filterStatsByBatch($batch_id);
        $this->qualities = $statisticRepository->getQualities();
        $this->updateStatsitics($statsByBatch);

    }

    public function handleFilterQualities(StatisticRepositoryInterface $statisticRepository, $quality_id)
    {

        /**fetch statistics by quality **/
        $statsByQuality = $statisticRepository->filterStatsByQuality($quality_id, $this->batch_id);
        $this->updateStatsitics($statsByQuality);

    }

    public function updateStatsitics($statistics)
    {
        $this->totalWeights = $statistics->totalWeights;
        $this->totalSummerWeights = $statistics->totalSummerWeights;
        $this->totalWinterWeights = $statistics->totalWinterWeights;
        $this->totalSpringWeights = $statistics->totalSpringWeights;
        $this->totalAutumnWeights = $statistics->totalAutumnWeights;
        $this->summerClothesPercentage = $statistics->summerClothesPercentage;
        $this->winterClothesPercentage = $statistics->winterClothesPercentage;
        $this->springClothesPercentage = $statistics->springClothesPercentage;
        $this->autumnClothesPercentage = $statistics->autumnClothesPercentage;

    }
}
