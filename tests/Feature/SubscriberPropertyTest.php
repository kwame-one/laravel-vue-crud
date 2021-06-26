<?php

namespace Tests\Feature;

use App\Services\SubscriberPropertyService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class SubscriberPropertyTest extends TestCase
{
    use RefreshDatabase;

    private $service;

    public function service()
    {
        if (!$this->service) {
            $this->service = new SubscriberPropertyService();
        }
        return $this->service;
    }

    public function test_store_subscriber_property()
    {
        $property = $this->service()->model()::factory()->make()->toArray();

        $response = $this->postJson("/api/subscriber_properties", $property);

        $response->assertCreated();

        $this->assertDatabaseHas('subscriber_properties', ['id' => $response['id']]);
    }

    public function test_store_subscriber_property_with_validation_errors()
    {

        $response = $this->postJson("/api/subscriber_properties", []);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_update_subscriber_property()
    {
        $property = $this->service()->model()::factory()->make()->toArray();

        $response = $this->postJson("/api/subscriber_properties", $property);

        $response->assertCreated();

        $this->assertDatabaseHas('subscriber_properties', ['id' => $response['id']]);

        $property['org_id'] = "111";

        $response = $this->putJson("/api/subscriber_properties/" . $response['id'], $property);

        $response->assertOk();

        $this->assertDatabaseHas("subscriber_properties", ['org_id' => $property['org_id']]);
    }

    public function test_find_subscriber_property()
    {
        $property = $this->service()->model()::factory()->make()->toArray();

        $response = $this->postJson("/api/subscriber_properties", $property);

        $response->assertCreated();

        $this->assertDatabaseHas('subscriber_properties', ['id' => $response['id']]);

        $response = $this->getJson("/api/subscriber_properties/" . $response['id']);

        $response->assertOk();
    }

    public function test_find_subscriber_property_not_found()
    {

        $response = $this->getJson("/api/subscriber_properties/123");

        $response->assertNotFound();
    }

    public function test_delete_subscriber_property()
    {
        $property = $this->service()->model()::factory()->make()->toArray();

        $response = $this->postJson("/api/subscriber_properties", $property);

        $response->assertCreated();

        $this->assertDatabaseHas('subscriber_properties', ['id' => $response['id']]);

        $response = $this->delete("/api/subscriber_properties/" . $response['id']);

        $response->assertNoContent();
    }
}
