@extends('layouts.admin')

@section('content')
    <h2>Зарегестрированные пользователи портала</h2>
    <div class="content__bottom margin-bottom-30">
        <div class="row">
            <ul class="list-group width-100-percent">
            @forelse($users as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center"
                        style="width: 90%;font-size: 1.1rem">
                        <p class="margin-0" style="width: 40%">{{ $item->name }}</p>
                        <span class="badge badge-primary badge-pill">
                            @if($item->is_admin)
                                админ
                                @else
                                юзер
                            @endif
                        </span>
                        <a href="{{ route('admin.profiles.edit', $item) }}">Редактировать</a>
                    </li>

            @empty
                <p>Пользователей нет</p>
            @endforelse
            </ul>
            <div class="container flex justify-content-center margin-top-30">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection

