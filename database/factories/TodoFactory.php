<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Feature\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucwords(fake()->words(4, true)),
            'priority' => fake()->numberBetween(1, 3),
            'desc' => ucfirst(fake()->words(20, true)),
            'start' => now(),
            'end' => now()->addHours(3)
        ];
    }
}
