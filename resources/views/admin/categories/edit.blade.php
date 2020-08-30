@extends('layouts.admin')

@section('content')
    <h2>Изменить категорию</h2>
    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Название категории</label>
            @if($errors->has('title'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('title') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="text" class="form-control" name="title" placeholder="Название категории"
                   @if(old('title'))
                   value="{{ old('title') }}"
                   @else
                   value="{{ $category->title }}"
                    @endif
            >
            <small class="form-text text-muted">Минимум 10 символов. Максимум 75 символов</small>
        </div>



        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
@endsection

