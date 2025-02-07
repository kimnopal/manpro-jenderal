<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\Proyek;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_invoice' => Supplier::factory(),
            'proyek_id' => Proyek::factory(),
            'tanggal' => $this->faker->date(),
            'catatan' => $this->faker->sentence,
        ];
    }
}
