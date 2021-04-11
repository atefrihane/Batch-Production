<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Season\Models\Season;

class ShowUpdateSeason extends Component
{
    public $season;
    public $name = '';

    public function mount($season)
    {

        $this->season = $season;
        $this->name = $this->season->name;

    }
    public function render()
    {
        return view('livewire.show-update-season');
    }

    public function handleUpdateSeason()
    {
        $validatedData = $this->validate([
            'name' => 'unique:seasons,name,' . $this->season->id . ',id|max:300',
        ]);

        Season::find($this->season->id)->update(['name' => $this->name]);
        $this->dispatchBrowserEvent('SeasonUpdated');

    }
}
