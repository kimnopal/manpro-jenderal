<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Item;
use App\Models\pembelian;
use App\Models\Proyek;
use App\Models\Rekening;
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
        User::create([
            'name' => 'Los Nexa',
            'email' => 'losnexa@gmail.com',
            'email_verified_at' => now(),
            'password' => '90900909',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Amin',
            'email' => 'aminbagus88@gmail.com',
            'email_verified_at' => now(),
            'password' => '12345678',
            'remember_token' => Str::random(10),
        ]);
        // Satuan::factory()->count(7)->create();
        // Bank::factory()->count(4)->create();
        // Supplier::factory(6)->create();
        Rekening::factory(100)->recycle(Supplier::factory(30)->create())->recycle(Bank::factory()->count(10)->create())->create();
        Item::factory(30)->create();
        Satuan::factory(10)->create();
        Client::factory(30)->create();
        Proyek::factory(20)->create();
        pembelian::factory(30)->create();
    }
}
