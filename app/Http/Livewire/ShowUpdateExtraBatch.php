<?php

namespace App\Http\Livewire;

use App\Modules\Batch\Models\Batch;
use App\Modules\Category\Models\Category;
use App\Modules\Pricing\Models\Pricing;
use App\Modules\Quality\Models\Quality;
use App\Modules\Season\Models\Season;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShowUpdateExtraBatch extends Component
{

    // public $countries = [];
    public $seasons = [];
    public $categories = [];
    public $qualities = [];
    public $pricings = [];
    // public $country_id = '';
    public $season_id = '';
    public $category_id = '';
    public $quality_id = '';
    public $pricing_id = '';
    public $name;
    public $description;
    public $weight;
    public $batch;

    public function mount($id)
    {

        $batch = Batch::with('season', 'category', 'quality', 'pricing')->find($id);
        if (!$batch) {

            return response()->view('showNotFound');

        }
        $this->batch = $batch;
   
        $this->name = $batch->name;
        $this->description = $batch->description;

        $this->weight = $batch->weight;
        $this->season_id = $batch->season_id;
        $this->category_id = $batch->category_id;
        $this->quality_id = $batch->quality_id;
        $this->pricing_id = $batch->pricing_id;

        $this->seasons = Season::all();
        $this->categories = Category::all();
        $this->qualities = Quality::all();
        $this->pricings = Pricing::all();

    }
    public function render()
    {
        return view('livewire.show-update-extra-batch');
    }

    public function uploadQrCode($name, $oldPath)
    {
        \File::delete($oldPath);
        $newPath = 'img/qrcodes/' . $name . '.svg';
        QrCode::generate($name, $newPath);
        return $newPath;
    }

    public function handleUpdateExtraBatch()
    {
      
        $validatedData = $this->validate([
            'name' => 'unique:batches,name,' . $this->batch->id . ',id|max:300',
            'description' => 'required|string|max:500',
            'weight' => 'required|numeric|min:1|max:10000',
            'season_id' => 'required|exists:seasons,id',
            'category_id' => 'required|exists:categories,id',
            'quality_id' => 'required|exists:qualities,id',
            'pricing_id' => 'required|exists:pricings,id',
        ]);

        $path = $this->batch->qr_code; //old qr code
        $this->batch->name != $this->name ? $path = $this->uploadQrCode($this->name, $path) : '';
          
        $this->batch->update([
            'name' => $this->name,
            'description' => $this->description,
            'weight' => $this->weight,
            'season_id' => $this->season_id,
            'category_id' => $this->category_id,
            'quality_id' => $this->quality_id,
            'pricing_id' => $this->pricing_id,
     

        ]);

        $this->dispatchBrowserEvent('extraBatchUpdated');

    }

}
