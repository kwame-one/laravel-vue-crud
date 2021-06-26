<?php

namespace Tests\Feature;

use App\Services\SubscriberPropertyValueService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class SubscriberPropertyValueTest extends TestCase
{
    use RefreshDatabase;

    private $service;

    public function service()
    {
        if (!$this->service) {
            $this->service = new SubscriberPropertyValueService();
        }
        return $this->service;
    }

    public function test_store_subscriber_property_value()
    {
        $property = $this->service()->model()::factory()->make()->toArray();

        $response = $this->postJson("/api/subscriber_property_values", $property);

        $response->assertCreated();

        $this->assertDatabaseHas('subscriber_property_values', ['id' => $response['id']]);
    }

    public function test_store_subscriber_property_with_validation_errors()
    {

        $response = $this->postJson("/api/subscriber_property_values", []);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_update_subscriber_property_value()
    {
        $property = $this->service()->model()::factory()->make()->toArray();

        $response = $this->postJson("/api/subscriber_property_values", $property);

        $response->assertCreated();

        $this->assertDatabaseHas('subscriber_property_values', ['id' => $response['id']]);

        $property['value'] = "kwame";

        $response = $this->putJson("/api/subscriber_property_values/" . $response['id'], $property);

        $response->assertOk();

        $this->assertDatabaseHas("subscriber_property_values", ['value' => $property['value']]);
    }

    public function test_find_subscriber_property_value()
    {
        $property = $this->service()->model()::factory()->make()->toArray();

        $response = $this->postJson("/api/subscriber_property_values", $property);

        $response->assertCreated();

        $this->assertDatabaseHas('subscriber_property_values', ['id' => $response['id']]);

        $response = $this->getJson("/api/subscriber_property_values/" . $response['id']);

        $response->assertOk();
    }

    public function test_find_subscriber_property_value_not_found()
    {

        $response = $this->getJson("/api/subscriber_property_values/123");

        $response->assertNotFound();
    }

    public function test_delete_subscriber_property_value()
    {
        $property = $this->service()->model()::factory()->make()->toArray();

        $response = $this->postJson("/api/subscriber_property_values", $property);

        $response->assertCreated();

        $this->assertDatabaseHas('subscriber_property_values', ['id' => $response['id']]);

        $response = $this->delete("/api/subscriber_property_values/" . $response['id']);
    }
}
