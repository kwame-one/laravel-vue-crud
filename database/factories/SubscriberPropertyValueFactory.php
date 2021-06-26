<?php

namespace Database\Factories;

use App\Models\Subscriber;
use App\Models\SubscriberProperty;
use App\Models\SubscriberPropertyValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberPropertyValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubscriberPropertyValue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subscriber_id' => Subscriber::create(Subscriber::factory()->make()->toArray())->id,
            'org_id' => $this->faker->word,
            'subscriber_property_id' => SubscriberProperty::create(SubscriberProperty::factory()->make()->toArray())->id,
            'value' => $this->faker->word
        ];
    }
}
