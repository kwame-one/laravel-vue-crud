<?php

namespace Tests\Feature;

use App\Services\SubscriberService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
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
     * store subscriber
     *
     * @return void
     */
    public function test_store_subscriber()
    {
        $subscriber = $this->subscriberService()->model()::factory()->make()->toArray();

        $response = $this->postJson('/api/subscribers', $subscriber);

        $response->assertCreated();

        $this->assertDatabaseHas('subscribers', ['id' => $response['id']]);
    }

    public function test_store_subscriber_with_validation_errors()
    {

        //assert validation errors
        $another_subscriber = $this->subscriberService()->model()::factory()->make()->toArray();

        $another_subscriber['phone'] = "";

        $new_response = $this->postJson('/api/subscribers', $another_subscriber);

        $new_response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }


    /**
     * update subscriber
     *
     * @return void
     */
    public function test_update_subscriber()
    {
        $subscriber = $this->subscriberService()->model()::factory()->make()->toArray();

        $response = $this->postJson('/api/subscribers', $subscriber);

        $response->assertCreated();

        $this->assertDatabaseHas('subscribers', ['id' => $response['id']]);

        $subscriber['phone'] = "000";

        $response = $this->putJson("/api/subscribers/" . $response['id'], $subscriber);

        $response->assertOk();

        $this->assertDatabaseHas('subscribers', ['phone' => $subscriber['phone']]);
    }

    public function test_update_subscriber_not_found()
    {

        $subscriber = $this->subscriberService()->model()::factory()->make()->toArray();

        $response = $this->putJson('/api/subscribers/10', $subscriber);

        $response->assertNotFound();
    }

    public function test_delete_subscriber()
    {
        $subscriber = $this->subscriberService()->model()::factory()->make()->toArray();

        $response = $this->postJson('/api/subscribers', $subscriber);

        $response->assertCreated();

        $this->assertDatabaseHas('subscribers', ['id' => $response['id']]);

        $response = $this->delete("/api/subscribers/" . $response['id']);

        $response->assertNoContent();
    }

    public function test_find_subscriber()
    {
        $subscriber = $this->subscriberService()->model()::factory()->make()->toArray();

        $response = $this->postJson('/api/subscribers', $subscriber);

        $response->assertCreated();

        $this->assertDatabaseHas('subscribers', ['id' => $response['id']]);

        $response = $this->getJson("/api/subscribers/" . $response['id']);

        $response->assertOk();
    }

    public function test_find_subscriber_not_found()
    {

        $response = $this->getJson("/api/subscribers/100");

        $response->assertNotFound();
    }
}
