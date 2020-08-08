@extends('layouts.main')

@section('content')
    <h2>Поиск новостей по категориям</h2>
    <div class="content__bottom margin-bottom-30">
        <div class="row">
            @forelse($categories as $item)
                <div class="col-lg-4">
                    <div class="content__bottom__single">
                        <div class="content__bottom__single__img margin-bottom-30"> <img src="https://placehold.it/237x157" alt="poster"> </div>
                        <div class="content__bottom__text">
                            <span><a href="{{ route('category.show', $item->id) }}">{{ $item->title }}</a></span>
                            <h3><a href="{{ route('category.show', $item->id) }}">Смотреть все</a></h3>
                        </div>
                    </div>
                </div>
            @empty
                <p>Категорий нет</p>
            @endforelse
        </div>
    </div>
@endsection

