<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
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
            'salario' => rand(100,800),
            'total' => rand(1000,2000),
        ];
    }
}
