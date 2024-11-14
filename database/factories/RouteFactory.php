<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Citi;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Vehicle;

class RouteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Route::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'scheduled_start_date' => $this->faker->dateTime(),
            'scheduled_finish_date' => $this->faker->dateTime(),
            'start_date' => $this->faker->dateTime(),
            'finish_date' => $this->faker->dateTime(),
            'driver_id' => Driver::factory(),
            'citi_id' => Citi::factory(),
            'vehicle_id' => Vehicle::factory(),
        ];
    }
}
