<?php

namespace App\Http\Livewire;

use App\Modules\Season\Models\Season;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSeasons extends Component
{
    use WithPagination;

    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $seasons = Season::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.show-seasons', [
            'seasons' => $seasons,
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

    public function handleDeleteSeason($id)
    {
        $checkSeason = Season::find($id);
        if ($checkSeason) {
            $checkSeason->delete();
            $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

}
