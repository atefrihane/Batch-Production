<?php

namespace App\Http\Livewire;

use App\Modules\Category\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCategories extends Component
{
    use WithPagination;

    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $categories = Category::query()
            ->whereNull('parent_id')
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.show-categories', [
            'categories' => $categories,
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

    public function handleDeleteCategory($id)
    {
        $checkCategory = Category::find($id);
        if ($checkCategory) {
            $checkCategory->delete();
            $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }
    }
}
