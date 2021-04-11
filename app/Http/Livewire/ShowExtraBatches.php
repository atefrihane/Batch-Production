<?php

namespace App\Http\Livewire;

use App\Modules\Batch\Models\Batch;
use Livewire\Component;
use Livewire\WithPagination;

class ShowExtraBatches extends Component
{
    use WithPagination;

    public $batch;
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

        $extraBatches = Batch::query()
            ->extra() //scope for extra batchesi
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)

            ->with('category', 'season', 'quality', 'pricing')
            ->paginate($this->perPage);

        return view('livewire.show-extra-batches', [
            'extraBatches' => $extraBatches,
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

}
