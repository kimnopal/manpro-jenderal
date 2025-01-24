<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ItemSatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('satuan_item')->insert([
        //         'item_id' => $faker->numberBetween(1, 30),
        //         'satuan_id' => $faker->numberBetween(1, 10),
        //     ]);
        // }

        $itemIds = DB::table('item')->pluck('id')->toArray();
        $satuanIds = DB::table('satuan')->pluck('id')->toArray();
    
        foreach ($itemIds as $itemId) {
            $randomSatuanIds = array_rand($satuanIds, 3); // Ambil 2 satuan secara acak
            foreach ($randomSatuanIds as $satuanId) {
                DB::table('satuan_item')->insert([
                    'item_id' => $itemId,
                    'satuan_id' => $satuanIds[$satuanId],
                ]);
            }
        }
    }
}
