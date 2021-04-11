<?php

namespace App\Http\Livewire;

use App\Modules\Role\Models\Role;
use App\Modules\User\Models\User;
use Livewire\Component;

class ShowUpdateUser extends Component
{
    public $user;
    public $first_name = '';
    public $last_name = '';
    public $role_id = '';
    public $email = '';
    public $password = '';
    public $roles = [];

    public function mount($user)
    {
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->role_id = $this->user->role_id;
        $this->email = $this->user->email;
    
        $this->roles = Role::all();
    }
    public function render()
    {
        return view('livewire.show-update-user');
    }

    public function handleUpdateUser()
    {
        $validatedData = $this->validate([
            'first_name' => 'required|string|max:300',
            'last_name' => 'required|string|max:300',
            'role_id' => 'required|exists:roles,id',
            'email' => 'required|email|unique:users,email,' . $this->user->id . ',id',
            'password' => 'nullable|string|max:300',
        ]);
        User::find($this->user->id)->update($validatedData);
        $this->dispatchBrowserEvent('UserUpdated');

    }
}
