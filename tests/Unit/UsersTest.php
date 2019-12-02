<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test **/
    public function a_user_can_have_a_team()
    {
        $user = factory('App\User')->create();

        $user->team()->create(['name' => 'Acme']);

        $this->assertEquals('Acme', $user->team->name);
    }
}
