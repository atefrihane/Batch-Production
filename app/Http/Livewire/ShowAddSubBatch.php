<?php

namespace App\Http\Livewire;

use App\Modules\Batch\Models\Batch;
use App\Modules\Category\Models\Category;
use App\Modules\Season\Models\Season;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShowAddSubBatch extends Component
{
    public $batch;
    public $name = '';
    public $description = '';
    public $weight = '';
    public $season_id = '';
    public $category_id = '';
    public $seasons = [];
    public $categories = [];
    protected $rules = [
        'name' => 'required|max:300',
        'description' => 'required|string|max:500',
        'weight' => 'required|numeric|min:1|max:10000',
        'category_id' => 'required|exists:categories,id',
        'season_id' => 'required|exists:seasons,id'
    ];

    public function mount($batch)
    {
        $this->batch = $batch;
        $this->seasons = Season::all();
        $this->categories = Category::all();
    }
    public function render()
    {
        return view('livewire.show-add-sub-batch');
    }

    public function handleAddSubBatch()
    {

        $validatedData = $this->validate();

        $newSubBatch = Batch::create([
            'name' => $this->name,
            'description' => $this->description,
            'season_id' => $this->season_id,
            'category_id' => $this->category_id,
            'weight' => $this->weight,
            'parent_id' => $this->batch->id,
            'country_id' => $this->batch->country_id,

        ]);

        $path = 'img/qrcodes/' . $newSubBatch->id . '.svg';
        QrCode::generate($newSubBatch->id, $path);
        $newSubBatch->qr_code = $path;
        $newSubBatch->save();

        $this->dispatchBrowserEvent('SubBatchAdded');

    }
}
