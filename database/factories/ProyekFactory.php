<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyek>
 */
class ProyekFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_proyek' => $this->faker->randomNumber(3),
            'tgl_mulai_kontrak' => $this->faker->date(),
            'tgl_selesai_kontrak' => $this->faker->date(),
            // 'klien_id' => Client::factory(),
            'klien_id' => $this->faker->randomElement(Client::pluck('id')->toArray()),
            'termin' => $this->faker->date(),
            'biaya' => $this->faker->numberBetween(50, 100) * 1000,
            'pajak' => $this->faker->numberBetween(1, 10) * 1000,
            'biaya_lain' => $this->faker->numberBetween(10, 20) * 1000,
        ];
    }
}
