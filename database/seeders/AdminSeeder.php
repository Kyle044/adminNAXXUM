<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => "admin",
            'password' => '$2y$10$MHf/Owae/HlJsNMEHv9RmuAjs1sAOHQed0mCJDxE1ZgOixJgyBWiy',
            'full_name' => "john kyle razon",
            "contact_number" => "09562516297",
            'email' => "admin@gmail.com",
            'remember_token' => Str::random(10)
        ]);
        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('admins')->insert([
        //         'username' => Str::random(10),
        //         'password' => Hash::make('password'),
        //         'full_name' => Str::random(10),
        //         'email' => Str::random(10) . '@gmail.com',
        //         "contact_number" => "0956" . rand(1, 50),
        //     ]);
        // }
        User::factory()
            ->count(10)
            ->create();
    }
}
