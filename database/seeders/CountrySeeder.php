<?php

namespace Database\Seeders;

use App\Modules\Country\Models\Country;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'name' => 'turkey',
                'created_at' => Carbon::now(),

            ],
            [
                'name' => 'UAE',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'saudi arabia',
                'created_at' => Carbon::now(),
            ],

            [
                'name' => 'bahrain',
                'created_at' => Carbon::now(),
            ],

            [
                'name' => 'oman',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'tunisia',
                'created_at' => Carbon::now(),
            ],
        ];

        Country::insert($countries);

    }
}
