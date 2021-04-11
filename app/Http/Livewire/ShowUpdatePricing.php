<?php

namespace App\Http\Livewire;

use App\Modules\Category\Models\Category;
use App\Modules\Pricing\Models\Pricing;
use App\Modules\Quality\Models\Quality;
use Livewire\Component;

class ShowUpdatePricing extends Component
{

    public $pricing = '';
    public $name = '';
    public $category_id = '';
    public $quality_id = '';
    public $price = '';
    public $categories = [];
    public $qualities = [];

    public function mount($pricing)
    {
        $this->pricing = $pricing;
        $this->categories = Category::all();
        $this->qualities = Quality::all();
        $this->name = $pricing->name;
        $this->category_id = $pricing->category_id;
        $this->quality_id = $pricing->quality_id;
        $this->price = $pricing->price;

    }
    public function render()
    {
        return view('livewire.show-update-pricing');
    }

    public function handleUpdatePricing()
    {

        $validatedData = $this->validate([
            'name' => 'unique:pricings,name,' . $this->pricing->id . ',id|max:300',
            'category_id' => 'required',
            'quality_id' => 'required|numeric|min:1|max:1000',
            'price' => 'required|numeric|min:1',
        ]);

        Pricing::find($this->pricing->id)
            ->update($validatedData);

        $this->dispatchBrowserEvent('PricingUpdated');

    }
}
