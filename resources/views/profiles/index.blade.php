@extends('layouts.admin')

@section('content')
    <h2>Зарегестрированные пользователи портала</h2>
    <div class="content__bottom margin-bottom-30">
        <div class="row">
            <ul class="list-group">
            @forelse($users as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $item->name }}
                        <span class="badge badge-primary badge-pill">14</span>
                        <a href="{{ route('admin.profiles.edit', $item) }}">Редактировать</a>
                    </li>
            @empty
                <p>Пользователей нет</p>
            @endforelse
            </ul>
            <div class="container flex justify-content-center margin-top-30">
{{--                {{ $users->links() }}--}}
            </div>
        </div>
    </div>
@endsection

