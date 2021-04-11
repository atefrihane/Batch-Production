<?php

namespace App\Http\Livewire;

use App\Modules\Batch\Models\Batch;
use Livewire\Component;
use Livewire\WithPagination;

class ShowReselledBatches extends Component
{
    use WithPagination;

    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function setSearchValue($value)
    {
        $this->search = $value;
    }

    public function render()
    {

        $batches = Batch::query()
            ->reselled()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->with('country','resell')
            ->paginate($this->perPage);

        return view('livewire.show-reselled-batches', [
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

}
