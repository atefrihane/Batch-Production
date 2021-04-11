<?php

namespace App\Http\Livewire;

use App\Modules\Batch\Models\Batch;
use App\Modules\Category\Models\Category;
use App\Modules\Season\Models\Season;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShowUpdateRoomTwoBatch extends Component
{
    public $batch;
    public $name = '';
    public $description = '';
    public $weight = '';


    public function mount($batch)
    {

        $this->batch = $batch;
        $this->name = $batch->name;
        $this->description = $batch->description;
        $this->weight = $batch->weight;
    }
    public function render()
    {
        return view('livewire.show-update-room-two-batch');
    }


    public function handleUpdateSubBatch()
    {

        $validatedData = $this->validate([
            'name' => 'required|max:300',
            'description' => 'required|string|max:500',
            'weight' => 'required|numeric|min:1|max:10000',

        ]);



        $this->batch->update($validatedData);
        $this->dispatchBrowserEvent('BatchUpdated');


        $this->dispatchBrowserEvent('BatchNotFound');
    }

  
}
