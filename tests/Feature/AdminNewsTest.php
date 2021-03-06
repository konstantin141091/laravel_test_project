<?php

namespace Tests\Feature;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class AdminNewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    private function getAdmin() {
        return Auth::loginUsingId(1);
    }

    private function getNewsId() {
        $news = DB::table('news')->select('id')->first();
        return $news->id;
    }

    private function getData() {
        $faker = Factory::create('ru_RU');
        $categoriesCount = Category::query()->count('id');

        $data = [
//                'title' => $faker->realText(20),
//                'text' => $faker->realText(50),
                'category_id' => $faker->numberBetween(1,$categoriesCount)

        ];
        return $data;
    }

    public function testIndex()
    {
        $this->getAdmin();
        $response = $this->get('admin/news');

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $this->getAdmin();
        $id = $this->getNewsId();
        $response = $this->get('admin/news/'.$id);

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $this->getAdmin();
        $response = $this->get('admin/news/create');

        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $this->getAdmin();
        $id = $this->getNewsId();
        $response = $this->get('admin/news/'.$id.'/edit');

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $this->getAdmin();
        $data = $this->getData();
        $response = $this->get('admin/news/create');
        $response = $this->call('post','admin/news', [
            '_token' => csrf_token(),
            'title' => 'test'. rand(1,2000),
            'text' => 'test'. rand(1,2000),
            'category_id' => $data['category_id']
        ]);

        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect('/admin');
        $response->assertSessionHas('success', 'Новость успешно добавлена');
    }

    public function testUpdate()
    {
        $this->getAdmin();
        $id = $this->getNewsId();
        $data = $this->getData();
        $response = $this->get('admin/news/'.$id.'/edit');
        $response = $this->call('put', 'admin/news/'.$id, [
            '_token' => csrf_token(),
            'id' => $id,
            'title' => 'test'. rand(1,2000),
            'text' => 'test'. rand(1,2000),
            'category_id' => $data['category_id']
        ]);
        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect('/admin/news');
        $response->assertSessionHas('success', 'Новость успешно обновлена');
    }

    public function testDelete()
    {
        $this->getAdmin();
        $id = $this->getNewsId();

        $response = $this->deleteJson('api/admin/news', ['id' => $id]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'good'
            ]);
    }
}
