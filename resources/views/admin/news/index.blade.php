@extends('layouts.admin')

@section('content')
    <div class="content__bottom margin-bottom-30">
        <div class="row">
            @forelse($news as $item)
                <div class="col-lg-4" id="{{ $item->id }}">
                    <div class="content__bottom__single">
                        <div class="content__bottom__single__img margin-bottom-30"> <img src="https://placehold.it/237x157" alt="poster"> </div>
                        <div class="content__bottom__text">

                            <span><a href="{{ route('admin.category.show', $item->category_id) }}">{{ $item->cat_title }}</a></span>
                            <div class="content__bottom__btn">
                                <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-outline-success margin-bottom-15">
                                    Редактировать</a>
                                <a href="#win1" class="btn btn-outline-danger margin-bottom-15 news-delete" data-news-id="{{ $item->id }}">
                                    Удалить</a>

{{--                                старое удаление через перезагрузку--}}
{{--                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="post">--}}
{{--                                    @method('DELETE')--}}
{{--                                    @csrf--}}

{{--                                    <button type="submit" class="btn btn-outline-danger news-delete">Удалить</button>--}}
{{--                                </form>--}}

                            </div>
                            <h3><a href="{{ route('admin.news.show', $item->id) }}">{{ $item->title }}</a></h3>

                        </div>

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
    <script src="{{ asset('js/newsDelete.js') }}"></script>
@endsection
