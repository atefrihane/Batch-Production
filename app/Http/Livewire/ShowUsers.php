<?php

namespace App\Http\Livewire;

use App\Modules\Role\Models\Role;
use App\Modules\User\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{

    use WithPagination;

    public $sortBy = 'first_name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $users = User::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->with('role')
            ->paginate($this->perPage);

        return view('livewire.show-users', [
            'users' => $users,
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

    public function handleDeleteUser($id)
    {
        $checkUser = User::find($id);
        if ($checkUser) {
            $checkUser->delete();
            $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

}
