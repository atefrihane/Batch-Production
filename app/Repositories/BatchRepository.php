<?php
namespace App\Repositories;

use App\Contracts\BatchRepositoryInterface;
use App\Modules\Batch\Models\Batch;

class BatchRepository implements BatchRepositoryInterface
{

    public function fetchAll($type)
    {
        return [
            'all' => Batch::all(),
        ][$type];

    }
    public function fetchByCountry($countryId)
    {
        return Batch::whereNull('parent_id')
            ->whereCountryId($countryId)
            ->get();
    }

    public function fetchById($id)
    {
        return Batch::with('categories')->find($id);

    }

    public function fetchSubBatchById($id)
    {
        return Batch::with('parent')->find($id);
    }
    public function fetchWithResell($id)
    {
        return Batch::with('resell')->find($id);  
    }
    public function getChildrenIds($id)
    {

        $checkBatch = $this->fetchById($id);
        if (!$checkBatch) {
            return false;
        }

        return $checkBatch->getChildrenIds();
    }

    public function update($user)
    {

    }

    public function delete($id)
    {

    }

    public function showSubBatches($id)
    {
        return Batch::find($id);
    }

}
