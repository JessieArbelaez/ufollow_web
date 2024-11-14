<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Incident;
use App\Models\Route;

class IncidentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Incident::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->regexify('[A-Za-z0-9]{45}'),
            'description' => $this->faker->text(),
            'datetime' => $this->faker->dateTime(),
            'route_id' => Route::factory(),
        ];
    }
}
