<?php

namespace App\Modules\Category\Controllers;

use App\Contracts\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $categories;
    public function __construct(CategoryRepositoryInterface $categories)
    {
        $this->categories = $categories;
    }

    public function showUpdateCategory($id)
    {
   
        $checkCategory = $this->categories->fetchByIdWithChildren($id);
        if ($checkCategory) {
            return view('Category::showUpdateCategory', ['category' => $checkCategory]);
        }
        return view('showNotFound');

    }
}
