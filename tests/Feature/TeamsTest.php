<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeamsTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_user_can_create_a_team()
    {
        $attributes = ['name' => 'Acme'];
        // Given I am a user who is logged in
        $this->actingAs(factory('App\User')->create());

        // When I hit the endpoint /teams to create a new team, while passing necessary data.
        $this->post('/teams', $attributes);
        
        // Then there should be a new team in database.
        $this->assertDatabaseHas('teams', $attributes);
    }

     /** @test **/
     public function guests_may_not_create_teams()
     {
        $this->withoutExceptionHandling();

        $this->post('/teams')->assertRedirect('/login');
     }
}
