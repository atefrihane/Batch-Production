<?php

namespace App\Http\Livewire;

use App\Modules\Pricing\Models\Pricing;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPricings extends Component
{
    use WithPagination;

    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $pricings = Pricing::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->with('category','quality')
            ->paginate($this->perPage);

        return view('livewire.show-pricings', [
            'pricings' => $pricings,
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

    public function handleDeletePricing($id)
    {
        $checkPricing = Pricing::find($id);
        if ($checkPricing) {
            $checkPricing->delete();
            $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

}
