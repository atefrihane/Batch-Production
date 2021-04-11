<?php

namespace App\Http\Livewire;

use App\Modules\Batch\Models\Batch;
use App\Modules\Country\Models\Country;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShowUpdateBatch extends Component
{
    public $batch;
    public $name = '';
    public $weight = '';
    public $description = '';
    public $country_id = '';
    public $countries = [];

    public function mount($batch)
    {

        $this->countries = Country::all();
        $this->batch = $batch;
        $this->name = $batch->name;
        $this->weight = $batch->weight;
        $this->description = $batch->description;
        $this->country_id = $batch->country_id;
    }
    public function render()
    {
        return view('livewire.show-update-batch');
    }

    public function uploadQrCode($name, $oldPath)
    {
        \File::delete($oldPath);
        $newPath = 'img/qrcodes/' . $name . '.svg';
        QrCode::generate($name, $newPath);
        return $newPath;
    }
    public function handleAddBatch()
    {
        $validatedData = $this->validate([
            'name' => 'required|max:300',

            'description' => 'required|max:500',
            'weight' => 'required|numeric|min:1|max:100000000',
            'country_id' => 'required|exists:countries,id',
        ]);

        $checkBatch = Batch::find($this->batch->id);
        if ($checkBatch) {
            $changedCountry = false;
            $checkBatch->country_id != $this->country_id ? $changedCountry = true : $changedCountry = false;
            $checkBatch->update([
                'name' => $this->name,
                'description' => $this->description,
                'weight' => $this->weight,
                'country_id' => $this->country_id,
            ]);
            $changedCountry ? $checkBatch->children()->update(['country_id' => $this->country_id]) : '';
            $this->dispatchBrowserEvent('BatchUpdated');
            return;
        }
        $this->dispatchBrowserEvent('BatchNotFound');

    }
}
