<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Batch\Models\Batch;
use App\Modules\Season\Models\Season;
use App\Modules\Pricing\Models\Pricing;
use App\Modules\Quality\Models\Quality;
use App\Modules\Category\Models\Category;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShowUpdateRoomThreeBatch extends Component
{
    public $batch;
    public $name = '';
    public $description = '';
    public $weight = '';
    public $season_id = '';
    public $category_id = '';
    public $subcategory_id = '';
    public $quality_id = '';
    public $pricing_id = '';
    public $seasons;
    public $categories = [];
    public $subcategories = [];
    public $qualities;
    public $pricings;

    protected $rules = [
        'name' => 'required|max:300',
        'description' => 'required|string|max:500',
        'season_id' => 'required|exists:seasons,id',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:categories,id',
        'weight' => 'required|numeric|min:1|max:10000',
        'quality_id' => 'required|exists:qualities,id',
        'pricing_id' => 'required|exists:pricings,id',
    ];
    public function mount($batch)
    {

        $this->batch = $batch;
        $this->name = $batch->name;
        $this->description = $batch->description;
        $this->weight = $batch->weight;

        $this->qualities = Quality::all();
        $this->pricings = Pricing::all();
        $this->categories = Category::all();
        $this->subcategories = Category::whereParentId($batch->categories->first()->id)->get();
        $this->seasons = Season::all();
        $this->quality_id = $batch->quality_id;
        $this->pricing_id = $batch->pricing_id;
        $this->season_id = $batch->season_id;
        $this->category_id = $batch->categories->first()->id;
        $this->category_id = $batch->categories->first()->id;
        $this->subcategory_id = $batch->categories->last()->id;
    }
    public function render()
    {
        return view('livewire.show-update-room-three-batch');
    }

    public function uploadQrCode($name, $oldPath)
    {
        \File::delete($oldPath);
        $newPath = 'img/qrcodes/' . $name . '.svg';
        QrCode::generate($name, $newPath);
        return $newPath;
    }

    public function handleAddQualityBatch()
    {

        $this->validate();


        $this->batch->update([
            'name' => $this->name,
            'description' => $this->description,
            'weight' => $this->weight,
            'quality_id' => $this->quality_id,
            'pricing_id' => $this->pricing_id,
            'season_id' => $this->season_id,

        ]);
        $this->batch->categories()->sync([$this->category_id, $this->subcategory_id]);
        $this->dispatchBrowserEvent('BatchUpdated');
    }

    public function loadSubCategories($id)
    {
        $this->subcategory_id = '';
        $subCategories = Category::whereParentId($id)->get();
        $this->subcategories = $subCategories;
    }
}
