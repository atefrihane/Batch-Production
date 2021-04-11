<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Modules\Season\Models\Season;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = [
            [
                'name' => 'summer',
                'created_at' => Carbon::now(),

            ],
            [
                'name' => 'winter',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'spring',
                'created_at' => Carbon::now(),
            ],

            [
                'name' => 'autumn',
                'created_at' => Carbon::now(),
            ],

        ];

        Season::insert($seasons);
    }
}
