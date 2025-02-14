<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Lot;
use App\Models\WorkType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkRecord>
 */
class WorkRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::factory(),
            'lot_id' => Lot::factory(),
            'work_type_id' => WorkType::factory(),
            'tariff' => $this->faker->randomFloat(2, 10, 100),
            'date' => $this->faker->date(),
            'amount' => $this->faker->randomNumber(2),
        ];
    }
}
