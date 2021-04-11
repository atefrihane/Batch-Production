<?php

namespace App\Http\Livewire;

use App\Modules\Category\Models\Category;
use App\Modules\Pricing\Models\Pricing;
use App\Modules\Quality\Models\Quality;
use Livewire\Component;

class ShowAddPricing extends Component
{
    public $name = '';

    public $category_id = '';
    public $quality_id = '';
    public $price = '';
    public $categories = [];
    public $qualities = [];
    protected $rules = [
        'name' => 'required|unique:pricings,name|max:300',
        'category_id' => 'required',
        'quality_id' => 'required|numeric|min:1|max:1000',
        'price' => 'required|numeric|min:1',
    ];

    public function mount()
    {

        $this->categories = Category::all();
        $this->qualities = Quality::all();
    }
    public function render()
    {
        return view('livewire.show-add-pricing');
    }

    public function handleAddPricing()
    {

        $validatedData = $this->validate();

        Pricing::create($validatedData);

        $this->dispatchBrowserEvent('PricingAdded');

    }
}
