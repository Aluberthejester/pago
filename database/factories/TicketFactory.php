<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
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
            'employee_ci' => Employee::all()->random()->ci,
            'mes_año' => $this->faker->word(),
            'fecha' => $this->faker->dateTimeBetween(now(), "+10 day"),
            'nombre' => rand(500,1900),
            'salario' => rand(500,1900),
            'aguinaldo' => rand(0,100),
            'desc' => rand(80,200),
            'bonos' => rand(80,200),
        ];
    }
}
