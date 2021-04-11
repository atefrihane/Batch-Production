<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Modules\Batch\Models\Batch;
use App\Modules\Season\Models\Season;
use App\Modules\Category\Models\Category;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShowSubstractStepOne extends Component
{
    public $batch;
    public $name;
    public $description;
    public $quantity;
    protected $rules = [
        'name' => 'required|max:300',
        'description' => 'required|max:500',
        'quantity' => 'required|numeric|gt:0',



    ];

    public function mount($batch)
    {
        $this->batch = $batch;
        $this->categories = Category::all();
        $this->seasons = Season::all();
    }


    public function render()
    {
        return view('livewire.show-substract-step-one');
    }

    public function handleSubstractFromBatch(Request $request)
    {
        $this->validate();
        $validQuantity = $this->batch->weight - $this->quantity;
        if ($validQuantity < 0) {
            $this->dispatchBrowserEvent('ErrorQuantity');
            return;
        }

        //create new batch for step 2

        $newBatch = Batch::create([
            'name' => $this->name,
            'description' => $this->description,
            'weight' => $this->quantity,
            'step' => $this->batch->step += 1,
            'parent_id' => $this->batch->id
        ]);

        // $path = 'img/qrcodes/' . $newBatch->id . '.svg';
        // QrCode::generate($newBatch->id, $path);
        // $newBatch->qr_code = $path;
        // $newBatch->save();

        //decrement source batch weight
        $this->batch->decrement('weight', $this->quantity);

        $this->dispatchBrowserEvent('BatchAdded');
    }
}
