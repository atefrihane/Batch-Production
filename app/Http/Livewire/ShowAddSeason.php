<?php

namespace App\Http\Livewire;

use App\Modules\Season\Models\Season;
use Livewire\Component;

class ShowAddSeason extends Component
{
    public $name = '';
    protected $rules = [
        'name' => 'required|unique:seasons,name|max:300',
    ];
    public function render()
    {
        return view('livewire.show-add-season');
    }

    public function handleAddSeason()
    {

        $this->validate();
  
        Season::create(['name' => $this->name]);
        $this->dispatchBrowserEvent('SeasonAdded');

    }
}
