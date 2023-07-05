<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bonus>
 */
class BonusFactory extends Factory
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
            'employee_ci' => Employee::all()->random()->ci,
            'templeado' => $enum[rand(0,1)],
            'meses' => rand(0,12),
            'bol1' => rand(500,1800),
            'bol2' => rand(500,1800),
            'bol3' => rand(500,1800),
            'salario' => rand(100,800),
            'total' => rand(1000,2000),
        ];
    }
}
