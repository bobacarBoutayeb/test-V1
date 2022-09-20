<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = new User();

        assertEquals('username',$user->getRouteKeyName());

        /*
        $response = $this->get('/');

        $response->assertStatus(200);
        */
    }
}
