<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Modules\Batch\Models\Batch;
use App\Modules\Season\Models\Season;
use App\Modules\Pricing\Models\Pricing;
use App\Modules\Quality\Models\Quality;
use App\Modules\Category\Models\Category;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShowSubstractStepTwo extends Component
{
    public $batch;
    public $name;
    public $description;
    public $qualities;
    public $pricings;
    public $seasons;
    public $quantity;
    public $categories = [];
    public $subcategories = [];
    public $season_id = '';
    public $category_id = '';
    public $subcategory_id = '';
    public $quality_id = '';
    public $pricing_id = '';

    protected $rules = [
        'name' => 'required|max:300',
        'description' => 'required|max:500',
        'season_id' => 'required|exists:seasons,id',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:categories,id',
        'quality_id' => 'required|exists:qualities,id',
        'pricing_id' => 'required|exists:pricings,id',
        'quantity' => 'required|numeric|gt:0',


    ];

    protected $messages = [
        'subcategory_id.required' => 'The sub category is required',
        'subcategory_id.exists' => 'The sub category has already been taken',

    ];
    public function mount($batch)
    {
        $this->batch = $batch;
        $this->qualities = Quality::all();
        $this->pricings = Pricing::all();
        $this->categories = Category::all();
        $this->seasons = Season::all();
    }


    public function render()
    {
        return view('livewire.show-substract-step-two');
    }

    public function handleSubstractFromBatch(Request $request)
    {
        $this->validate();
        $validQuantity = $this->batch->weight - $this->quantity;
        if ($validQuantity < 0) {
            $this->dispatchBrowserEvent('ErrorQuantity');
            return;
        }

        //create new batch for step 3

        $newBatch = Batch::create([
            'name' => $this->name,
            'description' => $this->description,
            'weight' => $this->quantity,
            'quality_id' => $this->quality_id,
            'pricing_id' => $this->pricing_id,
            'season_id' => $this->season_id,

            'step' => $this->batch->step += 1,
            'parent_id' => $this->batch->id
        ]);


        // $path = 'img/qrcodes/' . $newBatch->id . '.svg';
        // QrCode::generate($newBatch->id, $path);
        // $newBatch->qr_code = $path;
        // $newBatch->save();

        $newBatch->categories()->attach([$this->category_id, $this->subcategory_id]);


        //decrement source batch weight
        $this->batch->decrement('weight', $this->quantity);

        $this->dispatchBrowserEvent('BatchAdded');
    }

    public function loadSubCategories($id)
    {
        $this->subcategory_id = '';
        $subCategories = Category::whereParentId($id)->get();
        $this->subcategories = $subCategories;
    }
}
