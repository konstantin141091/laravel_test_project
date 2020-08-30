@extends('layouts.admin')

@section('content')
    <h2>Поиск новостей по категориям</h2>
    <a href="{{ route('admin.category.create') }}">Добавить категорию</a>
    <div class="content__bottom margin-bottom-30">
        <div class="row">
            @forelse($categories as $item)
                <div class="col-lg-4 margin-bottom-15">
                    <div class="content__bottom__single">
                        <div class="content__bottom__single__img margin-bottom-30"> <img src="https://placehold.it/237x157" alt="poster"> </div>
                        <div class="content__bottom__text">
                            <span><a href="{{ route('admin.category.show', $item->id) }}">{{ $item->title }}</a></span>
                            <h3><a href="{{ route('admin.category.show', $item->id) }}">Смотреть все</a></h3>
                            <div class="content__bottom__btn">
                                <a href="{{ route('admin.category.edit', $item->id) }}" class="btn btn-outline-success margin-bottom-15">Редактировать</a>
                                <form action="{{ route('admin.category.destroy', $item->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-outline-danger">Удалить</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>Категорий нет</p>
            @endforelse
        </div>
    </div>
@endsection

