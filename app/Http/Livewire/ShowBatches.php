<?php

namespace App\Http\Livewire;

use App\Modules\Batch\Models\Batch;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBatches extends Component
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
        $this->batches = Batch::find($value);

    }

    public function render()
    {

        $batches = Batch::query()
            ->firstStep()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)

            ->withCount('children')
            ->with('country')
            ->paginate($this->perPage);

        return view('livewire.show-batches', [
            'batches' => $batches,
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
            // $this->render();
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
