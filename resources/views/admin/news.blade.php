@extends('layouts.admin')

@section('content')
    <div class="content__bottom margin-bottom-30">
        <div class="row">
            @forelse($news as $item)
                <div class="col-lg-4">
                    <div class="content__bottom__single">
                        <div class="content__bottom__single__img margin-bottom-30"> <img src="https://placehold.it/237x157" alt="poster"> </div>
                        <div class="content__bottom__text">

                            <span><a href="#">{{ $item->cat_title }}</a></span>
                            <div class="content__bottom__btn">
                                <a href="/news/{{ $item->id }}/edit" class="btn btn-outline-success margin-bottom-15">Редактировать</a>
                                <form action="/news/{{ $item->id }}" method="post">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-outline-danger">Удалить</button>
                                </form>

                            </div>
                            <h3><a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a></h3>

                        </div>

                    </div>
                </div>
            @empty
                <p>Новостей нет</p>
            @endforelse
        </div>
    </div>
@endsection
