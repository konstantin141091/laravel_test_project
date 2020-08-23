<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfilesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProfile()
    {
        $user = $this->getAdmin();
        $response = $this->get('/profile');

        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertSee($user->email);
        $response->assertSee($user->crated_at);
    }

    public function testProfilesIndex()
    {
        $this->getAdmin();
        $response = $this->get('/admin/profiles');
        $response->assertStatus(200);
    }

    public function testProfilesEdit()
    {
        $this->getAdmin();
        $user = $this->getUser();
        $response = $this->get('/admin/profiles/'. $user->id .'/edit');
        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertSee($user->email);
    }

    public function testProfilesStore()
    {
        $this->getAdmin();
        $user = $this->getUser();
        $randNumber = rand(1,100);
        $name = 'TestName'. $randNumber;
        $response = $this->get('/admin/profiles/'. $user->id .'/edit');
        $response = $this->call('put','admin/profiles/'. $user->id, [
            '_token' => csrf_token(),
            'name' => $name,
            'email' => $user->email,
            'old_password' => true,
        ]);

        $response->assertRedirect('/admin/profiles');
        $response->assertSessionHas('success', 'Данные успешно обновлены');
    }






    private function getAdmin() {
        return Auth::loginUsingId(1);
    }

    private function getUser() {
        $user = DB::table('users')->find(2);
        return $user;
    }

}
