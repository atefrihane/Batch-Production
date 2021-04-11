<?php

namespace App\Http\Livewire;

use App\Modules\Quality\Models\Quality;
use Livewire\Component;
use Livewire\WithPagination;

class ShowQualities extends Component
{
    use WithPagination;

    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $qualities = Quality::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.show-qualities', [
            'qualities' => $qualities,
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

    public function handleDeleteQuality($id)
    {
        $checkQuality = Quality::find($id);
        if ($checkQuality) {
            $checkQuality->delete();
            $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

}
