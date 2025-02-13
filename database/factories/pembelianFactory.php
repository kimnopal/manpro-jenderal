<?php

namespace Database\Factories;
use App\Models\pembelian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pembelian>
 */
class pembelianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'proyekid' => $this->faker->numberBetween(1,20),
            'qty' => $this->faker->randomNumber(2),
            'satuanid' => $this->faker->numberBetween(1,10),
            'hargabeli' => $this->faker->numberBetween(10,20)*100000,
            'supplierid' => $this->faker->numberBetween(1,30),
        ];
    }
}
