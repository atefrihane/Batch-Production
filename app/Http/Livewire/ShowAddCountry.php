<?php

namespace App\Http\Livewire;

use App\Modules\Country\Models\Country;
use Livewire\Component;

class ShowAddCountry extends Component
{
    public $name = '';
    protected $rules = [
        'name' => 'required|unique:countries,name|max:300',
    ];
    public function render()
    {
        return view('livewire.show-add-country');
    }

    public function handleAddCountry()
    {
        $this->validate();
        Country::create(['name' => $this->name]);
        $this->dispatchBrowserEvent('CountryAdded');

    }
}
