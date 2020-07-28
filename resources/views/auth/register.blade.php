@extends('layouts.main')

@section('content')
    <h2>Зарегестрироваться на портале</h2>
    <form action="{{ route('register') }}" method="post" class="margin-bottom-30">
        @csrf

        <div class="form-group">
            <label>Ваше имя</label>
            @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>Ваша почта</label>
            @error('email')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>

        <div class="form-group">
            <label>Ваша пароль</label>
            @error('password')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        </div>

        <div class="form-group">
            <label>Повторите пароль</label>
            @error('password')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-primary">Зарегистрировать</button>
    </form>
@endsection
