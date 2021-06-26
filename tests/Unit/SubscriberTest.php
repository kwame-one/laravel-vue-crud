<?php

namespace Tests\Unit;

use App\Services\SubscriberService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscriberTest extends TestCase
{
    use RefreshDatabase;

    private $subscriber;

    public function subscriberService()
    {
        if (!$this->subscriber) {
            $this->subscriber = new SubscriberService();
        }

        return $this->subscriber;
    }

    /**
     * store subscriber.
     *
     * @return void
     */
    public function test_store_subscriber()
    {
        $subscriber = $this->subscriberService()
            ->store($this->subscriberService()->model()::factory()->make()->toArray());

        $this->assertDatabaseHas('subscribers', [
            'id' => $subscriber->id
        ]);
    }

    /**
     * store subscriber.
     *
     * @return void
     */
    public function test_delete_subscriber()
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
     * update subscriber.
     *
     * @return void
     */
    public function test_update_subscriber()
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
     * find subscriber.
     *
     * @return void
     */
    public function test_find_subscriber()
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
