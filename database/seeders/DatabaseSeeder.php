<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\School;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        School::factory(200)->create();
        Jurusan::factory(80)->create();
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('user');
        });
        // Post::factory(70)->create();
    }
}