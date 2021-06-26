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
            'subscriber_id' => Subscriber::factory()->create()->id,
            'org_id' => $this->faker->word,
            'subscriber_property_id' => SubscriberProperty::factory()->create()->id,
            'value' => $this->faker->word
        ];
    }
}
