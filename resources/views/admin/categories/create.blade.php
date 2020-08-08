@extends('layouts.admin')

@section('content')

    <h2>Добавление категории на портал</h2>
    <form action="{{ route('admin.category.store') }}" method="post" class="margin-bottom-30">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Название категории</label>
            @if($errors->has('title'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('title') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="text" class="form-control" name="title" placeholder="Название категории" value="{{ old('title') }}">
            <small class="form-text text-muted">Минимум 10 символов. Максимум 75 символов</small>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
