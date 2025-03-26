<?php

namespace Tests\Feature;

use App\Repositories\BookingRepository;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\Test\TestBookingRepository;
use App\Repositories\Test\TestProductRepository;
use ReflectionException;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->app->bind(BookingRepositoryInterface::class, TestBookingRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, TestProductRepository::class);
    }

    /**
     * A basic feature test example.
     */
    public function test_product_get_all_request(): void
    {
        $response = $this->get('/api/resources');

        $response->assertStatus(200);
    }

    public function test_product_put_request(): void
    {
        $response = $this->post('/api/resources',['name' => 'test_product', 'type' => 'test_type', 'description' => 'test_description']);

        $response->assertStatus(200);
    }

    public function test_booking_put_request(): void
    {
        $response = $this->post('/api/bookings?' . http_build_query([
            'resource_id' => 1,
                'user_id' => 1,
                'start_time' => date('Y-m-d H:i:s' , time()),
                'end_time' => date('Y-m-d H:i:s' , time() + 1)]));
        $response->assertStatus(200);
    }
    public function test_booking_get_request(): void
    {
        $response = $this->get('/api/resources/1/bookings');

        $response->assertStatus(200);
    }
    public function test_booking_delete_request(): void
    {
        $response = $this->get('/api/resources/1/bookings');
        $bookings = json_decode($response->getContent());
        $response = $this->delete('/api/bookings/' . $bookings->data[count($bookings->data) - 1]->id);

        $response->assertStatus(200);
    }

    /**
     * @throws ReflectionException
     */
    public function tearDown(): void
    {
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        parent::tearDown();
    }
}
