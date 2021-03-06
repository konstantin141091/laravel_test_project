<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\IsAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::query()->paginate(15);
        return view('admin.profiles.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        //
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::query()->find($id);

        return view('admin.profiles.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->flash();
        $this->validate($request, $this->validateRules($id), [], $this->attributesName());
        $user = User::query()->find($id);

//        без пароля
        if ($request->old_password) {
            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            if ($request->is_admin) {
                $user->fill([
                    'is_admin' => true
                ]);
            } else {
                $user->fill([
                    'is_admin' => false
                ]);
            }

            if ($user->save()) {
                return redirect()->route('admin.profiles.index')->with('success', 'Данные успешно обновлены');
            } else {
                return redirect()->back()->with('error', 'Что-то пошло не так. Не удалось обновить профиль');
            }

        }

        //        с новым паролем
        if (Hash::check($request->password, $user->password)) {
            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->new_password)
            ]);

            if ($request->is_admin) {
                $user->fill([
                    'is_admin' => true
                ]);
            } else {
                $user->fill([
                    'is_admin' => false
                ]);
            }

            if ($user->save()) {
                return redirect()->route('admin.profiles.index')->with('success', 'Данные успешно обновлены');
            } else {
                return redirect()->back()->with('error', 'Что-то пошло не так. Не удалось обновить профиль');
            }

        }
        else {
            return redirect()->back()->with('error', 'Неверный пароль или email');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        //
//    }

    /**
     * @param int $id
     * @return array
     */
    private function validateRules($id) {
        return [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email,'.$id,

        ];
    }

    private function attributesName() {
        return [
          'new_password' => 'Новый пароль'
        ];
    }
}
