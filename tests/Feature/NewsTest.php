<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    private function getNewsId() {
        $news = DB::table('news')->select('id')->first();
        return $news->id;
    }

    public function testIndex()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $id = $this->getNewsId();
        $response = $this->get('/news/'.$id);

        $response->assertStatus(200);
    }

}
