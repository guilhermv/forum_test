<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    public function a_user_can_view_all_threads()
    {
        $thread = factory('App\Thread')->create()
        
        $response = $this->get('/threads');
        $response->assertSee($thread->title);

        
    }


    function a_user_can_read_a_single_thread(){

        $thread = factory('App\Thread')->create()

        $response = $this->get('/threads/' . $thread->id);
        $response->assertSee($thread->title);

    }
}