<?php

namespace Database\Factories;

use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscriber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $status = [true, false];

        return [
            'phone' => $this->faker->phoneNumber,
            'org_id' => $this->faker->word,
            'is_active' => $status[rand(0, 1)],
            'created_at' => now()
        ];
    }
}
