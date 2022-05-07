<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'ihsandevs@ihsandevs.com',
            'is_verified' => true,
            'password' => bcrypt('secret'),
        ]);

        $admin->assignRole('admin');

        $this->command->info('Admin seeded!');
    }
}