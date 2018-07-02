<?php

namespace Tests\Feature;

use App\Admin;
use App\User;
use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

class UserUpdateTest extends TestCase
{
    use  RefreshDatabase;
   /**
    * @test
    */

    public  function user_can_be_updated() {
         $admin = factory(Admin::class)->create();
         $user = factory(User::class)->create();
         $this->actingAs($admin);

         $this->withoutMiddleware();
         $this->post('admin/users/edit/1' , [
             'name' => 'soluiman',
             'email' => 'random@test.com'
         ])->assertStatus(302);
          $user = $user->fresh();
          $this->assertEquals('soluiman' , $user->name);
          $this->assertEquals('random@test.com' , $user->email);

    }

    ///users/edit/{userId}'
}
