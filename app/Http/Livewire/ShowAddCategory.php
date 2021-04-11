<?php

namespace App\Http\Livewire;

use App\Modules\Category\Models\Category;
use Livewire\Component;

class ShowAddCategory extends Component
{
    public $name = '';
    public $code = '';
    public $subCategories = [];
    protected $rules = [
        'name' => 'required|unique:categories,name|max:300',
        'code' => 'required|unique:categories,code|max:300',
        'subCategories' => 'array|min:0',
        'subCategories.*.name' => 'string|distinct|min:0|max:300|unique:categories,name',
        'subCategories.*.code' => 'string|distinct|min:0|max:300|unique:categories,code',

    ];

    protected $messages = [
        'subCategories.*.name.unique' => 'The sub category name has already been taken',
        'subCategories.*.code.unique' => 'The sub category code has already been taken',
    ];
    public function render()
    {
        return view('livewire.show-add-category');
    }

    public function handleAddCategory()
    {

        $this->validate();

        $newCategory = Category::create([
            'name' => $this->name,
            'code' => $this->code
        ]);
        if (!empty($this->subCategories)) {
            $newCategory->children()->createMany($this->subCategories);
        }


        $this->dispatchBrowserEvent('CategoryAdded');
    }


    public function handleAddSubCategory()
    {
        array_push($this->subCategories, [
            'name' => '',
            'code' => ''
        ]);
    }


    public function deleteSubCategory($key)
    {
        unset($this->subCategories[$key]);
    }



    // test for main category  name dupplication

    public function checkCategoryName($value)
    {



        if (!empty($this->subCategories)) {

            foreach ($this->subCategories as $subcategory) {


                if ($subcategory['name'] == $value) {

                    $this->name = '';
                    $this->dispatchBrowserEvent('CategoryAlreadyExist');
                }
            }
        }
    }

    // test for main category  code dupplication

    public function checkCategoryCode($value)
    {


        if (!empty($this->subCategories)) {

            foreach ($this->subCategories as $subcategory) {

                if ($subcategory['code'] == $value) {
                    $this->code = '';
                    $this->dispatchBrowserEvent('CategoryCodeAlreadyExist');
                    return;
                }
            }
        }
    }



    // test for sub category name dupplication

    public function checkSubCategoryName($key, $value)
    {

        if ($this->name == $value) {

            $this->subCategories[$key]['name'] = '';
            $this->dispatchBrowserEvent('CategoryAlreadyExist');
        }

        if (!empty($this->subCategories) && count($this->subCategories) > 1) {

            foreach ($this->subCategories as $keySub => $subcategory) {

                if ($subcategory['name'] == $value && $keySub != $key) {

                    $this->subCategories[$key]['name'] = '';
                    $this->dispatchBrowserEvent('CategoryAlreadyExist');
                    return;
                }
            }
        }
    }



    // test for sub category code dupplication
    public function checkSubCategoryCode($key, $value)
    {

        if ($this->code == $value) {

            $this->subCategories[$key]['code'] = '';
            $this->dispatchBrowserEvent('CategoryCodeAlreadyExist');
        }

        if (!empty($this->subCategories) && count($this->subCategories) > 1) {

            foreach ($this->subCategories as $keySub => $subcategory) {

                if ($subcategory['code'] == $value && $keySub != $key) {

                    $this->subCategories[$key]['code'] = '';
                    $this->dispatchBrowserEvent('CategoryAlreadyExist');
                }
            }
        }
    }
}
