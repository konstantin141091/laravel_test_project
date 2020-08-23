<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/category');

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $id = $this->getCategoryId();
        $response = $this->get('/category/'. $id);

        $response->assertStatus(200);
    }

    private function getCategoryId() {
        $category = DB::table('categories')->select('id')->first();
        return $category->id;
    }
}
