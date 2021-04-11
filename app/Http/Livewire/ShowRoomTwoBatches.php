<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Modules\Batch\Models\Batch;

class ShowRoomTwoBatches extends Component
{
    use WithPagination;


    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';



    protected $listeners = [
        'set:search' => 'setSearchValue',
    ];

    public function setSearchValue($value)
    {
        $this->search = $value;
    }

    public function render()
    {

        $roomTwoBatches = Batch::query()
            ->secondStep()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->withCount('children')
      
            ->paginate($this->perPage);



        return view('livewire.show-room-two-batches', [
            'roomTwoBatches' => $roomTwoBatches,
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
