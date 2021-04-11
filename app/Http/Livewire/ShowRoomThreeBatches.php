<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Modules\Batch\Models\Batch;

class ShowRoomThreeBatches extends Component
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

        $roomThreeBatches = Batch::query()
            ->thirdStep()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->withCount('children')
            ->with('season','categories','pricing', 'quality')
            ->paginate($this->perPage);



        return view('livewire.show-room-three-batches', [
            'roomThreeBatches' => $roomThreeBatches,
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

    public function handleDeleteBatch($id)
    {
        $checkBatch = Batch::find($id);
        if ($checkBatch) {
            if (!\File::exists($checkBatch->qr_code)) {
                $this->dispatchBrowserEvent('FileNotFound');
            }
            \File::delete($checkBatch->qr_code);
            $checkBatch->delete();
       
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
