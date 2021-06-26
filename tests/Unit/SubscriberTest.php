<?php

namespace Tests\Unit;

use App\Services\SubscriberService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscriberTest extends TestCase
{
    use RefreshDatabase;

    private $service;

    public function subscriberService()
    {
        if (!$this->service) {
            $this->service = new SubscriberService();
        }

        return $this->service;
    }

    /**
     * store service.
     *
     * @return void
     */
    public function test_store_service()
    {
        $subscriber = $this->subscriberService()
            ->store($this->subscriberService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscribers', [
            'id' => $subscriber->id
        ]);
    }

    /**
     * store service.
     *
     * @return void
     */
    public function test_delete_service()
    {

        $subscriber = $this->subscriberService()
            ->store($this->subscriberService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscribers', [
            'id' => $subscriber->id
        ]);

        $this->subscriberService()->destroy($subscriber->id);

        $this->assertDatabaseMissing('subscribers', [
            'id' => $subscriber->id
        ]);

        //delete data not found
        $this->assertNotTrue($this->subscriberService()->destroy($subscriber->id));
    }

    /**
     * update service.
     *
     * @return void
     */
    public function test_update_service()
    {
        $subscriber = $this->subscriberService()
            ->store($this->subscriberService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscribers', [
            'id' => $subscriber->id
        ]);


        $subscriber->phone = "000000";

        $updated = $this->subscriberService()->update($subscriber->id, $subscriber->toArray());

        $this->assertDatabaseHas('subscribers', [
            'phone' => $updated->phone
        ]);
    }

    /**
     * find service.
     *
     * @return void
     */
    public function test_find_service()
    {

        $subscriber = $this->subscriberService()
            ->store($this->subscriberService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscribers', [
            'id' => $subscriber->id
        ]);

        $exists = $this->subscriberService()->show($subscriber->id);

        $this->assertNotNull($exists);

        $not_exists = $this->subscriberService()->show(10);

        $this->assertNull($not_exists);
    }
}
