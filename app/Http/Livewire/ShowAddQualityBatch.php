<?php

namespace App\Http\Livewire;

use App\Modules\Batch\Models\Batch;
use App\Modules\Pricing\Models\Pricing;
use App\Modules\Quality\Models\Quality;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShowAddQualityBatch extends Component
{
    public $batch;
    public $name = '';
    public $description = '';
    public $weight = '';

    public $quality_id = '';
    public $pricing_id = '';
    public $qualities = [];
    public $pricings = [];
    protected $rules = [
        'name' => 'required|max:300',
        'description' => 'required|string|max:500',
        'weight' => 'required|numeric|min:1|max:10000',
        'quality_id' => 'required|exists:qualities,id',
        'pricing_id' => 'required|exists:pricings,id',
    ];

    public function mount($batch)
    {
        $this->batch = $batch;

        $this->qualities = Quality::all();

        $this->pricings = Pricing::all();
    }
    public function render()
    {
        return view('livewire.show-add-quality-batch');
    }

    public function handleAddQualityBatch()
    {

        $validatedData = $this->validate();
    
        $newQualityBatch = Batch::create([
            'name' => $this->name,
            'description' => $this->description,
            'quality_id' => $this->quality_id,
            'pricing_id' => $this->pricing_id,
            'weight' => $this->weight,
            'parent_id' => $this->batch->id,
            'country_id' => $this->batch->country_id,
            'season_id' => $this->batch->season_id,
            'category_id' => $this->batch->category_id,

        ]);
        $path = 'img/qrcodes/' . $newQualityBatch->id . '.svg';
        QrCode::generate($newQualityBatch->id, $path);
        $newQualityBatch->qr_code = $path;
        $newQualityBatch->save();

        $this->dispatchBrowserEvent('BatchQualityAdded');

    }
}
