<?php

namespace App\Http\Livewire;

use App\Modules\Country\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCountries extends Component
{
    use WithPagination;

    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $countries = Country::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.show-countries', [
            'countries' => $countries,
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

    public function handleDeleteCountry($id)
    {
        $checkCountry = Country::find($id);
        if ($checkCountry) {
            $checkCountry->delete();
            $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

}
