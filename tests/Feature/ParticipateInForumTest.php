<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiffleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    function unauthenticated_user_may_note_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('/threads/1/replies',[]);
    }

    function an_authenticated_user_may_participate_in_forum_threads()
    {
    
        $this->be($user = factory('App\User')->create());
    
        $thread = factory('App\Thread')->create();

        $reply = factory('App\Reply')->make();
        $this->post($thread->path().'/replies',$reply->toArray());

        $this->get($thread->path())
            ->assertSee($reply->body);
    }
    
}
