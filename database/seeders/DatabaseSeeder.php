<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'name' => 'Rahmat',
            'email' => 'rahmat@example.com',
            'email_verified_at' => now(),
            'password' => '12345678',
            'remember_token' => Str::random(10),
        ]);
        Satuan::factory()->count(7)->create();
        Bank::factory()->count(4)->create();
        Supplier::factory(6)->create();
        Client::factory(10)->create();
    }
}
