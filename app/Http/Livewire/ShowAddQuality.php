<?php

namespace App\Http\Livewire;

use App\Modules\Quality\Models\Quality;
use Livewire\Component;

class ShowAddQuality extends Component
{
    public $name = '';
    protected $rules = [
        'name' => 'required|unique:qualities,name|max:300',
    ];

    
    public function render()
    {
        return view('livewire.show-add-quality');
    }

    public function handleAddQuality()
    {
        $this->validate();
        Quality::create(['name' => $this->name]);
        $this->dispatchBrowserEvent('QualityAdded');

    }
}
