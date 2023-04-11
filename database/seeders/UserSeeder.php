<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contact;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Radhika Rani',
            'email'=>'raniradhika@gmail.com',
            'email_verified_at' => now(),
            'password'=>bcrypt('password')
        ]);

        Contact::create([
            'user_id'=>1,
            'contact'=>9887787654,
            'type'=>'Hopme',
            'code'=>91
        ]);
    }
}
