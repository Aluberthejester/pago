<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bond>
 */
class BondFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'post_id' => Post::all()->random()->id,
            'salario' => rand(500,1800),
            'bproduc' => rand(0,100),
            'bvaca' => rand(0,100),
            'bfin' => rand(0,100),
            'pago' => rand(500, 1800),
        ];
    }
}
