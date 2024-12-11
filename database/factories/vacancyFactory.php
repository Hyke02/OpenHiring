<?php

namespace Database\Factories;

use App\Models\vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class vacancyFactory extends Factory
{
    protected $model = vacancy::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->jobTitle(),
            'company_name'=> $this->faker->company(),
            'images'=> $this->faker->imageUrl(),
            'description' => $this->faker->text(),
            'salary' => $this->faker->numberBetween(1000, 10000),
            'location_id' => $this->faker->numberBetween(1, 5),
            'sector_id' => $this->faker->numberBetween(1, 5),
            'requirements' => $this->faker->text(),
            'hours' => $this->faker->numberBetween(1, 5),
            'awaiting' => $this->faker->numberBetween(1, 5),
            'wanted' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(1, 5),

        ];
    }
}
