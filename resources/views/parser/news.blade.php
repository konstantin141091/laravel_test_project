@extends('layouts.main')

@section('content')
    <div class="content__bottom margin-bottom-30">
{{--        <a href="{{ route('parser.save') }}">Сохранить эти новости в базу данных</a>--}}
        <div class="row">
            @forelse($resources as $item)
                <h3 class="width-100-percent">{{ $item->title }}</h3>
                @foreach($item->news as $news)
                    <div class="col-lg-4">
                        <div class="content__bottom__single">
                            <div class="content__bottom__single__img margin-bottom-30">
                                <img src="https://placehold.it/237x157" alt="poster">
                            </div>
                            <div class="content__bottom__text">
                                <h3><a href="{{ $news->link }}">{{ $news->title }}</a></h3>

                                <div class="content__bottom__btn">
                                    <form action="{{ route('parser.save') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="title" value="{{ $news->title }}">
                                        <input type="hidden" name="text" value="{{ $news->description }}">
                                        <button type="submit" class="btn btn-outline-success">Сохранить на портал</button>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                @endforeach
            @empty
                <p>Новостей нет</p>
            @endforelse
{{--            <div class="container flex justify-content-center margin-top-30">--}}
{{--                {{ $news->links() }}--}}
{{--            </div>--}}
        </div>
    </div>
@endsection

