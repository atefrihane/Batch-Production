<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowUpdateReselledBatch extends Component
{
    public $batch;
    public $description;
    public $price;

    public function mount($batch)
    {

        $this->batch = $batch;
        $this->description = $batch->resell->description;
        $this->price = $batch->resell->price;
   
    }
    public function render()
    {

        return view('livewire.show-update-reselled-batch');
    }

    public function handleUpdateResell()
    {
        $validatedData = $this->validate([
            'description' => 'required|string|max:500',
            'price' => 'required|numeric|min:1',

        ]);
  
        $this->batch->resell()->update([
            'description' => $this->description,
            'price' => $this->price,
        ]);

        $this->dispatchBrowserEvent('BatchResellUpdated');
    }
}
