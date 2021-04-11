<?php

namespace Database\Seeders;

use App\Modules\Role\Models\Role;
use App\Modules\User\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newRoles = [
            [
                'name' => 'superadmin',
                'created_at' => Carbon::now(),
            ],

            [
                'name' => 'first step',
                'created_at' => Carbon::now(),
            ],

            [
                'name' => 'second step',
                'created_at' => Carbon::now(),
            ],

            [
                'name' => 'third step',
                'created_at' => Carbon::now(),
            ],

            [
                'name' => 'accountant ',
                'created_at' => Carbon::now(),
            ],
        ];
        Role::insert($newRoles);

        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'test@test.tn',
            'password' => '123456',
            'role_id' => 1,
        ]);
    }
}
