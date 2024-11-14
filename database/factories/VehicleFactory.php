<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Vehicle;
use App\Models\VehicleType;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'plate' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'vehicle_type_id' => VehicleType::factory(),
        ];
    }
}
