@extends('layouts.main')

@section('content')
    <div class="content__bottom margin-bottom-30">
        <a href="{{ route('parser.save') }}">Сохранить эти новости в базу данных</a>
        <div class="row">
            @forelse($news as $item)
                <div class="col-lg-4">
                    <div class="content__bottom__single">
                        <div class="content__bottom__single__img margin-bottom-30"> <img src="https://placehold.it/237x157" alt="poster"> </div>
                        <div class="content__bottom__text">
                            <h3><a href="{{ $item['link'] }}">{{ $item['title'] }}</a></h3> </div>
                    </div>
                </div>
            @empty
                <p>Новостей нет</p>
            @endforelse
{{--            <div class="container flex justify-content-center margin-top-30">--}}
{{--                {{ $news->links() }}--}}
{{--            </div>--}}
        </div>
    </div>
@endsection

