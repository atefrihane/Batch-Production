<?php

namespace App\Http\Livewire;

use App\Modules\Batch\Models\Batch;
use App\Modules\Category\Models\Category;
use App\Modules\Pricing\Models\Pricing;
use App\Modules\Quality\Models\Quality;
use App\Modules\Season\Models\Season;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShowAddExtraBatch extends Component
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

    protected $rules = [
        'name' => 'required|max:300',
        'description' => 'required|string|max:500',
        'weight' => 'required|numeric|min:1|max:10000',
        // 'country_id' => 'required|exists:countries,id',
        'season_id' => 'required|exists:seasons,id',
        'category_id' => 'required|exists:categories,id',
        'quality_id' => 'required|exists:qualities,id',
        'pricing_id' => 'required|exists:pricings,id',
    ];

    public function mount()
    {
        // $this->countries = Country::all();
        $this->seasons = Season::all();
        $this->categories = Category::all();
        $this->qualities = Quality::all();
        $this->pricings = Pricing::all();

    }
    public function render()
    {
        return view('livewire.show-add-extra-batch');
    }

    public function handleAddExtraBatch()
    {

        $validatedData = $this->validate();

        $newExtraBatch = Batch::create([
            'name' => $this->name,
            'weight' => $this->weight,
            'description' => $this->description,
            // 'country_id' => $this->batch->country_id,
            'season_id' => $this->season_id,
            'category_id' => $this->category_id,
            'quality_id' => $this->quality_id,
            'pricing_id' => $this->pricing_id,

        ]);

        $path = 'img/qrcodes/' . $newExtraBatch->id . '.svg';
        QrCode::generate($newExtraBatch->id, $path);
        $newExtraBatch->qr_code = $path;
        $newExtraBatch->save();
        $this->dispatchBrowserEvent('extraBatchAdded');

    }

}
