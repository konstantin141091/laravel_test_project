<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
    public function index() {
        $user = \Auth::user();
        return view('profiles.index', ['user' => $user]);
    }
}
