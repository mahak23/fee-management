<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Mehak',
            'last_name' => 'Dhiman',
            'email' => 'sahilogel755@gmail.com',
            'password' => bcrypt('Sahil@123'),
            'email_verified' => 1,
            'status' => 1,
            'role' => 2 // For School
        ]);
    }
}
