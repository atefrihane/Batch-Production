<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Modules\Category\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'men',
                'code' => 'M',
                'created_at' => Carbon::now(),


            ],
            [
                'name' => 'women',
                'code' => 'W',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'kids',
                'code' => 'K',
                'created_at' => Carbon::now(),
            ],

        ];

        Category::insert($categories);
    }
}
