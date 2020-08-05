@extends('layouts.admin')

@section('content')
    <h2>Добавление новости на портал</h2>
    <form action="{{ route('admin.news.update', $news->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Заголовок статьи</label>
            @if($errors->has('title'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('title') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="text" class="form-control" name="title" placeholder="Заголовок статьи"
                   @if(old('title'))
                   value="{{ old('title') }}"
                   @else
                   value="{{ $news->title }}"
                   @endif
                   >
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
                    <option @if($item->id == $news->category_id)
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
            <textarea class="form-control" name="text" rows="10">@if(old('text')){{ old('text') }}
                @else{{ $news->text }}
                @endif
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
@endsection
