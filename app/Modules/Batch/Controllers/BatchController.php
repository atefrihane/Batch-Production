<?php

namespace App\Modules\Batch\Controllers;

use App\Contracts\BatchRepositoryInterface;
use App\Http\Controllers\Controller;

class BatchController extends Controller
{
    private $batches;
    public function __construct(BatchRepositoryInterface $batches)
    {
        $this->batches = $batches;
    }

    public function showUpdateBatchRoomOne($id)
    {
        $checkBatch = $this->batches->fetchById($id);
        if ($checkBatch) {
            return view('Batch::showUpdateBatch', ['batch' => $checkBatch]);
        }
        return view('showNotFound');
    }

    public function showUpdateBatchRoomTwo($id)
    {
        
        $checkBatch = $this->batches->fetchById($id);
        if ($checkBatch) {
            return view('Batch::showUpdateBatchRoomTwo', ['batch' => $checkBatch]);
        }
        return view('showNotFound');
    }



    public function showUpdateBatchRoomThree($id)
    {
        $checkBatch = $this->batches->fetchById($id);
        if ($checkBatch) {
            return view('Batch::showUpdateBatchRoomThree', ['batch' => $checkBatch]);
        }
        return view('showNotFound');
    }


    public function showManageSubBatches($id)
    {
        $checkBatch = $this->batches->showSubBatches($id);
        if ($checkBatch) {

            return view('Batch::showManageSubBatches', ['batch' => $checkBatch]);
        }
        return view('showNotFound');
    }
    public function showAddSubBatch($id)
    {
        $checkBatch = $this->batches->fetchById($id);
        if ($checkBatch) {
            return view('Batch::showAddSubBatch', ['batch' => $checkBatch]);
        }
        return view('showNotFound');
    }

    public function showUpdateSubBatch($id)
    {

        $checkSubBatch = $this->batches->fetchSubBatchById($id);
        if ($checkSubBatch) {

            return view('Batch::showUpdateSubBatch', ['subBatch' => $checkSubBatch]);
        }
        return view('showNotFound');
    }

    public function showBatchQualities($id)
    {

        $checkQualityBatch = $this->batches->fetchById($id);
        if ($checkQualityBatch) {

            return view('Batch::showBatchQualities', ['qualityBatch' => $checkQualityBatch]);
        }
        return view('showNotFound');
    }

    public function showAddQualityBatch($id)
    {
        $checkQualityBatch = $this->batches->fetchSubBatchById($id);
        if ($checkQualityBatch) {

            return view('Batch::showAddQualityBatch', ['checkQualityBatch' => $checkQualityBatch]);
        }
        return view('showNotFound');
    }
    public function showUpdateQualityBatch($id)
    {
        $checkQualityBatch = $this->batches->fetchSubBatchById($id);
        if ($checkQualityBatch) {

            return view('Batch::showUpdateQualityBatch', ['checkQualityBatch' => $checkQualityBatch]);
        }
        return view('showNotFound');
    }

    public function showAddReselledBatch($id)
    {
        $checkBatch = $this->batches->fetchSubBatchById($id);
        if ($checkBatch) {

            return view('Batch::showAddReselledBatch', ['batch' => $checkBatch]);
        }
        return view('showNotFound');
    }

    public function showUpdateReselledBatch($id)
    {
        $checkBatch = $this->batches->fetchWithResell($id);
        if ($checkBatch) {

            return view('Batch::showUpdateReselledBatch', ['batch' => $checkBatch]);
        }
        return view('showNotFound');
    }

    public function showBatchToPrint($id)
    {
        $checkBatchToPrint = $this->batches->fetchById($id);
        if ($checkBatchToPrint) {

            return view('Batch::showBatchToPrint', ['batch' => $checkBatchToPrint]);
        }
        return view('showNotFound');
    }

    public function showSubstractBatch($id)
    {
        $checkBatch = $this->batches->fetchById($id);
        if ($checkBatch) {

            return view('Batch::showSubstractBatch', ['batch' => $checkBatch]);
        }
        return view('showNotFound');
    }

    public function showSubstractBatchRoomTwo($id)
    {
        $checkBatch = $this->batches->fetchById($id);
        if ($checkBatch) {

            return view('Batch::showSubstractBatchRoomTwo', ['batch' => $checkBatch]);
        }
        return view('showNotFound');
    }
}
