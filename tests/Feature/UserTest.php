<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

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
    public function test_getRouteKeyName(): void
    {
        $user = new User();
        $this->assertEquals('username',$user->getRouteKeyName());
    }


    public function test_articlesFromUser()
    {
        $user = Article::all()->where('user_id',2)->toArray();

        foreach ($user as $article)
        {
            $this->assertArrayHasKey('user_id', $article, 'error user_id');
            $this->assertArrayHasKey('title', $article, 'error title');
            $this->assertArrayHasKey('slug', $article, 'error slug');
            $this->assertArrayHasKey('description', $article, 'error description');
            $this->assertArrayHasKey('created_at', $article, 'error created_at');
            $this->assertArrayHasKey('updated_at', $article, 'error updated_at');
        }
    }

    public function test_doesUserFollowAnotherUser()
    {
        $user1 = User::all()->firstWhere("email", "rose@mail.com");
        $user2 = User::all()->firstWhere("email", "musonda@mail.com");

        $this->assertIsBool($user1->doesUserFollowAnotherUser($user1->id, $user2->id));
        $this->assertTrue($user1->doesUserFollowAnotherUser($user1->id, $user2->id));
    }
}
