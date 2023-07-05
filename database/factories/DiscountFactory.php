<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::all()->random()->id,
            'salario_base' => rand(500,2000),
            'desc_salud' => rand(0,100),
            'desc_jubi' => rand(0,100),
            'desc_fns' => rand(0,100),
            'desc_fpc' => rand(0,100),
            'neto' => rand(500,1500),
        ];
    }
}
