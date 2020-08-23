@extends('layouts.main')

@section('content')
    <h2>Личный кабинет пользователя</h2>
    <div class="content__bottom margin-bottom-30">
        <div class="row">
            <ul class="ul">
                <li><p><span>Имя: </span>{{ $user->name }}</p></li>
                <li><p><span>Email: </span>{{ $user->email }}</p></li>
                <li><p><span>Дата регистрации: </span>{{ $user->created_at }}</p></li>
            </ul>
        </div>
    </div>
@endsection


