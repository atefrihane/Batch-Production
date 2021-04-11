<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Role\Models\Role;
use App\Modules\User\Models\User;

class ShowAddUser extends Component
{
    public $first_name = '';
    public $last_name = '';
    public $role_id = '';
    public $email = '';
    public $password = '';
    public $roles = [];

    protected $rules = [
        'first_name' => 'required|string|max:300',
        'last_name' => 'required|string|max:300',
        'role_id' => 'required|exists:roles,id',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|max:300',
    ];

    public function mount()
    {
        $this->roles = Role::all();
    }
    public function render()
    {
        return view('livewire.show-add-user');
    }

    public function handleAddUser()
    {
        $validatedData = $this->validate();
        User::create($validatedData);
        $this->dispatchBrowserEvent('UserAdded');

    }
}
