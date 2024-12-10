<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $is_solved = fake()->boolean();

        return [
            'name' => fake()->name(),
            'email' =>  fake()->boolean() ? fake()->email() : null,
            'phone_number' => fake()->boolean() ? fake()->phoneNumber() : null,
            'topic' => fake()->sentence(),
            'description' => fake()->text(),
            'image' => fake()->boolean() ? 'reports/report-test.png' : null,
            'is_solved' => $is_solved,
            'solved_by' => $is_solved ? rand(1, 10) : null,
            'created_at' => date(
                'Y-m-d',
                strtotime(fake()->randomElement(['+', '-']) . mt_rand(0, 30) . ' days')
            )
        ];
    }
}
