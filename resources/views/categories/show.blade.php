@extends('layouts.main')

@section('content')
    <h2>Новости категории: <strong>{{ $category->title }}</strong></h2>
    <div class="content__bottom margin-bottom-30">
        <div class="row">
            @forelse($news as $item)
                <div class="col-lg-4">
                    <div class="content__bottom__single">
                        <div class="content__bottom__single__img margin-bottom-30"> <img src="https://placehold.it/237x157" alt="poster"> </div>
                        <div class="content__bottom__text"> <span><a href="#">{{ $category->title }}</a></span>
                            <h3><a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a></h3> </div>
                    </div>
                </div>
            @empty
                <p>Новостей нет</p>
            @endforelse
            <div class="container flex justify-content-center margin-top-30">
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection

