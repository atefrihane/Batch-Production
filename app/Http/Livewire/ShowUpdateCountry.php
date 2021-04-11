<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Country\Models\Country;

class ShowUpdateCountry extends Component
{
    public $country;
    public $name = '';

    public function mount($country)
    {

        $this->country = $country;
        $this->name = $this->country->name;

    }
    public function render()
    {
        return view('livewire.show-update-country');
    }

    public function handleUpdateCountry()
    {
        $validatedData = $this->validate([
            'name' => 'unique:countries,name,' . $this->country->id . ',id|max:300',
        ]);

        Country::find($this->country->id)->update(['name' => $this->name]);
        $this->dispatchBrowserEvent('CountryUpdated');

    }
}
