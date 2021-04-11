<?php

namespace App\Http\Livewire;

use App\Modules\Batch\Models\BatchResell;
use Livewire\Component;

class ShowAddReselledBatch extends Component
{
    public $batch;
    public $description;
    public $price;
    public $batch_id;
  
    public function mount($batch)
    {
        $this->batch = $batch;
        $this->batch_id = $batch->id;
    }
    public function render()
    {
        return view('livewire.show-add-reselled-batch');
    }

    public function handleAddResell()
    {
        $validatedData = $this->validate([
            'description' => 'required|string|max:500',
            'price' => 'required|numeric|min:1',
            'batch_id' => 'unique:batch_resells,batch_id',
        ]);

        BatchResell::create([
            'description' => $this->description,
            'price' => $this->price,
            'batch_id' => $this->batch->id,
        ]);
        $this->batch->update(['status' => 0]);
        $this->dispatchBrowserEvent('BatchResellAdded');
    }
}
