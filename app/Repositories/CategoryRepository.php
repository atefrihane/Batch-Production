<?php
namespace App\Repositories;

use App\Contracts\CategoryRepositoryInterface;
use App\Modules\Category\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function fetchAll($type)
    {
        $filters = [

            'all' => Category::all(),
            'count' => Category::count()
        ];

        return $filters[$type];

    }

    public function fetchById($id)
    {
        return Category::find($id);

    }
    public function fetchByIdWithChildren($id)
    {
        return Category::with('children')->find($id);

    }
    public function store($country)
    {
        return Category::create($country);

    }
    public function update($country)
    {

    }

}
