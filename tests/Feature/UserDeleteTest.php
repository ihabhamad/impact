<?php

namespace Tests\Feature;
use App\Admin;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_soft_deleted() {
        $admin = factory(Admin::class)->create();
        $user = factory(User::class)->create();
        $this->actingAs($admin);

        $this->withoutMiddleware();
        $this->post('/admin/users/delete/2')->assertStatus(302);
        $user = $user->fresh();
        dd($user->deleted_at);
        $this->assertNotEquals(null , $user->deleted_at);


    }
}
