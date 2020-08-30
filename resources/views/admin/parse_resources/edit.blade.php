@extends('layouts.admin')

@section('content')
    <h2>Изменить ресурс</h2>
    <form action="{{ route('admin.resources.update', $resource) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Название Ресурса</label>
            @if($errors->has('name'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('name') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="text" class="form-control" name="name" placeholder="Название ресурса"
                   @if(old('name'))
                   value="{{ old('name') }}"
                   @else
                   value="{{ $resource->name }}"
                    @endif
            >
            <small class="form-text text-muted">Минимум 2 символа. Максимум 75 символов</small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Адрес Ресурса</label>
            @if($errors->has('url'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('url') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="text" class="form-control" name="url" placeholder="Адрес ресурса"
                   @if(old('url'))
                   value="{{ old('url') }}"
                   @else
                   value="{{ $resource->url }}"
                    @endif
            >
        </div>



        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
@endsection
