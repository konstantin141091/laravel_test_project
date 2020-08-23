<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminCategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    private function getAdmin() {
        return Auth::loginUsingId(1);
    }

    private function getCategoryId() {
        $category = DB::table('categories')->select('id')->first();
        return $category->id;
    }

//    private function getData() {
//        $faker = Factory::create('ru_RU');
//        $categoriesCount = Category::query()->count('id');
//
//        $data = [
////                'title' => $faker->realText(20),
////                'text' => $faker->realText(50),
//            'category_id' => $faker->numberBetween(1,$categoriesCount)
//
//        ];
//        return $data;
//    }

    public function testIndex()
    {
        $this->getAdmin();
        $response = $this->get('admin/category');

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $this->getAdmin();
        $id = $this->getCategoryId();
        $response = $this->get('admin/category/'.$id);

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $this->getAdmin();
        $response = $this->get('admin/category/create');

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
        $response = $this->get('admin/category/create');
        $response = $this->call('post','admin/category', [
            '_token' => csrf_token(),
            'title' => 'тест'. rand(1,2000),
        ]);

        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect('/admin');
        $response->assertSessionHas('success', 'Категория успешно добавлена');
    }

    public function testUpdate()
    {
        $this->getAdmin();
        $id = $this->getCategoryId();
        $response = $this->get('admin/category/'.$id.'/edit');
        $response = $this->call('put', 'admin/category/'.$id, [
            '_token' => csrf_token(),
            'id' => $id,
            'title' => 'тест'. rand(1,2000),
        ]);
        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect('/admin/category');
        $response->assertSessionHas('success', 'Категория успешно обновлена');
    }

    public function testDelete()
    {
        $this->getAdmin();
        $id = 5; /*не стал генерировать случайную категорию*/

        $response = $this->call('delete', 'admin/category/'.$id);

        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect('/admin/category');
        $response->assertSessionHas('success', 'Категория успешно удалена');
    }
}
