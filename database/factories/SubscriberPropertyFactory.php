<?php

namespace Database\Factories;

use App\Models\SubscriberProperty;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberPropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubscriberProperty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $status = [true, false];

        return [
            'name' => $this->faker->word,
            'org_id' => $this->faker->word,
            'is_private' => $status[rand(0, 1)],
            'created_at' => now()
        ];
    }
}
