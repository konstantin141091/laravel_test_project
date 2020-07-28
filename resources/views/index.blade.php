@extends('layouts.main')

@section('content')

    <div class="content__top margin-bottom-30">
        <div class="content__top__img"> <img src="https://placehold.it/770x410" alt="poster">
            <div class="content__top__text">
                <span><a href="{{ route('category.show', $oneNews->category_id) }}">{{ $oneNews->cat_title }}</a></span>
                <h2><a href="{{ route('news.show', $oneNews->id) }}">{{ $oneNews->title }}</a></h2> </div>
        </div>
    </div>
    <div class="content__bottom margin-bottom-30">
        <div class="row">
            @forelse($news as $item)
                <div class="col-lg-4">
                    <div class="content__bottom__single">
                        <div class="content__bottom__single__img margin-bottom-30"> <img src="https://placehold.it/237x157" alt="poster"> </div>
                        <div class="content__bottom__text">
                            <span><a href="{{ route('category.show', $item->category_id) }}">{{ $item->cat_title }}</a></span>
                            <h3><a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a></h3> </div>
                    </div>
                </div>
                @empty
                <p>Новостей нет</p>
            @endforelse
        </div>
    </div>

@endsection


