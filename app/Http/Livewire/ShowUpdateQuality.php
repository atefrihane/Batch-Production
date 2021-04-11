<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Quality\Models\Quality;

class ShowUpdateQuality extends Component
{
    public $quality;
    public $name = '';

    public function mount($quality)
    {

        $this->quality = $quality;
        $this->name = $this->quality->name;

    }
    public function render()
    {
        return view('livewire.show-update-quality');
    }

    public function handleUpdateQuality()
    {
        $validatedData = $this->validate([
            'name' => 'unique:qualities,name,' . $this->quality->id . ',id|max:300',
        ]);

        Quality::find($this->quality->id)->update(['name' => $this->name]);
        $this->dispatchBrowserEvent('QualityUpdated');

    }
}
