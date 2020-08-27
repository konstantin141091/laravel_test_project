<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;


class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function loginVK() {

        return Socialite::driver('vkontakte')->redirect();
    }

    public function callbackVK() {
        $user = Socialite::driver('vkontakte')->user();
        $email = $user->getEmail();

        $objUser = new User();
        $result = $objUser->loginVK([
                    'email' => $email
                ]);

        if (!$result) {
            return redirect()->route('login')->with('error', 'Нет зарегестрированного пользователя с email: '. $email);
        }

        return redirect()->route('profile.index')->with('success', 'Вы успешно авторизованы');
    }

    public function loginFB() {

        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFB() {

        $user = Socialite::driver('facebook')->user();
        dd($user);
    }
}
