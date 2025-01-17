<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $index = 0;
    public function definition(): array
    {
    
        $data = [
            'BRI',
            'BCA',
            'BNI',
            'BTN',
            'Mandiri',
            'Danamon',
            'BSI',
            'Cimb Niaga',
            'Permata',
            'Jateng'
        ];
    
        $currentValue = $data[static::$index % count($data)];
        static::$index++;

        return [
            'nama_bank' => $currentValue,
        ];;
    }
}
