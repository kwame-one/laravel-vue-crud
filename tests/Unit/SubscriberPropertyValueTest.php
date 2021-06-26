<?php

namespace Tests\Unit;

use App\Services\SubscriberPropertyValueService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscriberPropertyValueTest extends TestCase
{
    use RefreshDatabase;

    private $service;

    public function subscriberPropertyValueService()
    {
        if (!$this->service) {
            $this->service = new SubscriberPropertyValueService();
        }

        return $this->service;
    }

    /**
     * store subscriber property  value.
     *
     * @return void
     */
    public function test_store_subscriber_property_value()
    {
        $subscriber_property_value = $this->subscriberPropertyValueService()
            ->store($this->subscriberPropertyValueService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscriber_property_values', [
            'id' => $subscriber_property_value->id
        ]);
    }

    /**
     * delete subscriber property value
     *
     * @return void
     */
    public function test_delete_subscriber_property_value()
    {

        $subscriber_property_value = $this->subscriberPropertyValueService()
            ->store($this->subscriberPropertyValueService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscriber_property_values', [
            'id' => $subscriber_property_value->id
        ]);

        $this->subscriberPropertyValueService()->destroy($subscriber_property_value->id);

        $this->assertDatabaseMissing('subscriber_property_values', [
            'id' => $subscriber_property_value->id
        ]);

        //delete data not found
        $this->assertNotTrue($this->subscriberPropertyValueService()->destroy($subscriber_property_value->id));
    }

    /**
     * update subscriber property value
     *
     * @return void
     */
    public function test_update_subscriber_property_value()
    {
        $subscriber_property_value = $this->subscriberPropertyValueService()
            ->store($this->subscriberPropertyValueService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscriber_property_values', [
            'id' => $subscriber_property_value->id
        ]);


        $subscriber_property_value->value = "new_value";

        $updated = $this->subscriberPropertyValueService()->update($subscriber_property_value->id, $subscriber_property_value->toArray());

        $this->assertDatabaseHas('subscriber_property_values', [
            'value' => $updated->value
        ]);
    }

    /**
     * find subscriber property value
     *
     * @return void
     */
    public function test_find_subscriber_property_value()
    {

        $subscriber_property_value = $this->subscriberPropertyValueService()
            ->store($this->subscriberPropertyValueService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscriber_property_values', [
            'id' => $subscriber_property_value->id
        ]);

        $exists = $this->subscriberPropertyValueService()->show($subscriber_property_value->id);

        $this->assertNotNull($exists);

        $not_exists = $this->subscriberPropertyValueService()->show(10);

        $this->assertNull($not_exists);
    }
}
