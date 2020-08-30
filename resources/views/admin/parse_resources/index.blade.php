@extends('layouts.admin')

@section('content')
    <h2>Список ресурсов</h2>
    <a href="{{ route('admin.resources.create') }}">Добавить ресурс</a>
    <div class="content__bottom margin-bottom-30">
        <div class="row">
            <ul class="list-group width-100-percent">
                @forelse($resources as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center"
                        style="width: 90%;font-size: 1.1rem">
                        <p class="margin-0" style="width: 7%">{{ $item->name }}</p>
                        <p class="margin-0" style="width: 40%">{{ $item->url }}</p>
                        <a href="{{ route('admin.resources.edit', $item) }}">Редактировать</a>
                        <form action="{{ route('admin.resources.destroy', $item) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button>Удалить</button>
                        </form>
{{--                        <a href="{{ route('admin.resources.destroy', $item) }}">Удалить</a>--}}
                    </li>

                @empty
                    <p>Ресурсов нет</p>
                @endforelse
            </ul>
            <div class="container flex justify-content-center margin-top-30">
                {{ $resources->links() }}
            </div>
        </div>
    </div>
@endsection
