<?php

namespace Tests\Unit;

use App\Services\SubscriberPropertyService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscriberPropertyTest extends TestCase
{
    use RefreshDatabase;

    private $service;

    public function subscriberPropertyService()
    {
        if (!$this->service) {
            $this->service = new SubscriberPropertyService();
        }

        return $this->service;
    }

    /**
     * store subscriber property.
     *
     * @return void
     */
    public function test_store_subscriber_property()
    {
        $subscriber_property = $this->subscriberPropertyService()
            ->store($this->subscriberPropertyService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscriber_properties', [
            'id' => $subscriber_property->id
        ]);
    }

    /**
     * delete subscriber property.
     *
     * @return void
     */
    public function test_delete_subscriber_property()
    {

        $subscriber_property = $this->subscriberPropertyService()
            ->store($this->subscriberPropertyService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscriber_properties', [
            'id' => $subscriber_property->id
        ]);

        $this->subscriberPropertyService()->destroy($subscriber_property->id);

        $this->assertDatabaseMissing('subscriber_properties', [
            'id' => $subscriber_property->id
        ]);

        //delete data not found
        $this->assertNotTrue($this->subscriberPropertyService()->destroy($subscriber_property->id));
    }

    /**
     * update subscriber property.
     *
     * @return void
     */
    public function test_update_subscriber_property()
    {
        $subscriber_property = $this->subscriberPropertyService()
            ->store($this->subscriberPropertyService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscriber_properties', [
            'id' => $subscriber_property->id
        ]);


        $subscriber_property->name = "new_name";

        $updated = $this->subscriberPropertyService()->update($subscriber_property->id, $subscriber_property->toArray());

        $this->assertDatabaseHas('subscriber_properties', [
            'name' => $updated->name
        ]);
    }

    /**
     * find subscriber property
     *
     * @return void
     */
    public function test_find_subscriber_property()
    {

        $subscriber_property = $this->subscriberPropertyService()
            ->store($this->subscriberPropertyService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscriber_properties', [
            'id' => $subscriber_property->id
        ]);

        $exists = $this->subscriberPropertyService()->show($subscriber_property->id);

        $this->assertNotNull($exists);

        $not_exists = $this->subscriberPropertyService()->show(10);

        $this->assertNull($not_exists);
    }
}
