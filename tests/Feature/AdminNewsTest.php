<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminNewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {

        $response = $this->get('admin/news');

        $response->assertRedirect('/login');
    }

    public function testShow()
    {
        $id = rand(1, 50);
        $response = $this->get('admin/news/'.$id);

        $response->assertRedirect('/login');
    }

    public function testCreate()
    {
        $response = $this->get('admin/news/create');

        $response->assertRedirect('/login');
    }

    public function testEdit()
    {
        $id = rand(1, 50);
        $response = $this->get('admin/news/'.$id.'/edit');

        $response->assertRedirect('/login');
    }

    public function testStore()
    {
        $response = $this->post('admin/news');

        $response->assertRedirect('/login');
    }

    public function testUpdate()
    {
        $id = rand(1, 50);
        $response = $this->put('admin/news/'.$id);

        $response->assertRedirect('/login');
    }

    public function testDelete()
    {
        $id = rand(1,20);
//        $this->assertAuthenticatedAs('admin', $guard = null);
        $response = $this->delete('admin/news/'.$id);

        $response->assertRedirect('/login');
    }
}
