<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $enum = ['planta','contrato'];
        return [
            //
            'ci' => rand(10000000,99999999),
            'user_id' => User::all()->random()->id,
            'nomb' => $this->faker->word(),
            'apell' => $this->faker->word(),
            'fechanac' => $this->faker->dateTimeBetween("-10 day" , now()),
            'tel' => rand(0,100),
            'temple' => $enum[rand(0,1)],
            'post_id' => Post::all()->random()->id,
            'dir' => $this->faker->word(),
            'tcontrato' => $this->faker->dateTimeBetween(now(), "+10 day"),
        ];
    }
}
