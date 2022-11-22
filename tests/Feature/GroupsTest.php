<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\TestResponse;

class GroupsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_groups_response()
    {
        $response = $this->get('/groups');

        $response->assertOk();
    }
    public function test_groups_create_view_response()
    {
        $response = $this->get('/groups/create');

        $response->assertOk();
    }
    public function test_groups_add_response()
    {
        $response = $this->post('/groups', [
            'title' => 'Group Name'
        ]);

        $response->assertOk();
    }
    public function test_groups_delete_response()
    {
        $response = $this->delete('/groups/{id}', [
            'id' => '1'
        ]);
        $response->assertOk();
        $response->assertRedirect('/groups');
    }
}