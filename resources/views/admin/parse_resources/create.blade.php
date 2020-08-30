@extends('layouts.admin')

@section('content')

    <h2>Добавление ресурса на портал</h2>
    <form action="{{ route('admin.resources.store') }}" method="post" class="margin-bottom-30">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Название ресурса</label>
            @if($errors->has('name'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('name') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="text" class="form-control" name="name" placeholder="Название ресурса" value="{{ old('name') }}">
            <small class="form-text text-muted">Минимум 2 символа. Максимум 75 символов</small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Адрес ресурса</label>
            @if($errors->has('url'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('url') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="text" class="form-control" name="url" placeholder="Адрес ресурса" value="{{ old('url') }}">
        </div>



        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection

{{--@push('js')--}}
{{--    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>--}}
{{--    <script>--}}
{{--      CKEDITOR.replace('form_text');--}}
{{--    </script>--}}
{{--@endpush--}}

