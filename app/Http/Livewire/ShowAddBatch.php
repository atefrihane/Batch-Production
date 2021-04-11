<?php

namespace App\Http\Livewire;

use App\Modules\Batch\Models\Batch;
use App\Modules\Country\Models\Country;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShowAddBatch extends Component
{
    public $name = '';
    public $weight = '';
    public $description = '';
    public $country_id = '';
    public $countries = [];
    protected $rules = [
        'name' => 'required|max:300',
        'description' => 'required|max:500',
        'weight' => 'required|numeric|min:1|max:1000000',
        'country_id' => 'required|exists:countries,id',
    ];

    public function mount()
    {

        $this->countries = Country::all();
    }
    public function render()
    {
        return view('livewire.show-add-batch');
    }

    public function handleAddBatch()
    {

        $validatedData = $this->validate();

        $newBatch = Batch::create([
            'name' => $this->name,
            'description' => $this->description,
            'weight' => $this->weight,
            'country_id' => $this->country_id,
            'step' => 1
        ]);

        // $path = 'img/qrcodes/' . $newBatch->id . '.svg';
        // QrCode::generate($newBatch->id, $path);
        // $newBatch->qr_code = $path;
        // $newBatch->save();

        $this->dispatchBrowserEvent('BatchAdded');

    }
}
