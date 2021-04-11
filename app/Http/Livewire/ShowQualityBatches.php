<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Modules\Batch\Models\Batch;

class showUpdateBatchRoomThree extends Component
{
    use WithPagination;

    public $batch;
    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function mount($batch)
    {
        $this->batch = $batch;

    }

    protected $listeners = [
        'set:search' => 'setSearchValue',
    ];

    public function setSearchValue($value)
    {
        $this->search = $value;
    }

    public function render()
    {

        $qualityBatches = Batch::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->whereParentId($this->batch->id)
            ->with('quality','pricing')
            ->paginate($this->perPage);

          

        return view('livewire.show-quality-batches', [
            'qualityBatches' => $qualityBatches,
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {

        $this->render();

    }

    public function handleDeleteSubBatch($id)
    {
        $checkSubBatch = Batch::find($id);
        if ($checkSubBatch) {
            if (!\File::exists($checkSubBatch->qr_code)) {
                $this->dispatchBrowserEvent('FileNotFound');
            }
            \File::delete($checkSubBatch->qr_code);
            $checkSubBatch->delete();
            $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }


    public function handleEndProcessBatch($id)
    {
        $checkBatch = Batch::find($id);
        if ($checkBatch) {

            $checkBatch->update(['last_scan' => Carbon::now()]);
    
            $this->dispatchBrowserEvent('ProcessEnded');
            $this->dispatchBrowserEvent('RefreshDropDown');
        }
    }

}
