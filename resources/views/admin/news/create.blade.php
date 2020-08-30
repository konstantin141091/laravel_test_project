@extends('layouts.admin')

@section('content')

    <h2>Добавление новости на портал</h2>
    <form action="{{ route('admin.news.store') }}" method="post" class="margin-bottom-30" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Заголовок статьи</label>
            @if($errors->has('title'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('title') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="text" class="form-control" name="title" placeholder="Заголовок статьи" value="{{ old('title') }}">
            <small class="form-text text-muted">Минимум 10 символов. Максимум 75 символов</small>
        </div>
        <div class="form-group">
            <label>Категория новости</label>
            @if($errors->has('category_id'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('category_id') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <select class="form-control" name="category_id">
                @forelse($categories as $item)
                    <option @if($item->id == old('category_id'))
                                selected
                            @endif
                            value="{{ $item->id }}">{{ $item->title }}</option>
                @empty
                    <h2>Нет категорий</h2>
                    @endforelse

            </select>
        </div>

        <div class="form-group">
            <label for="exampleTextarea">Текс новости</label>
            @if($errors->has('text'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('text') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <textarea class="form-control" name="text" rows="10" id="form_text">{{ old('text') }}</textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Изображение</label>
            @if($errors->has('img'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('img') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="file" class="form-control" name="img" placeholder="Изображение" value="{{ old('img') }}">
{{--            <small class="form-text text-muted">Минимум 10 символов. Максимум 75 символов</small>--}}
        </div>

        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection

@push('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('form_text');
    </script>
@endpush
