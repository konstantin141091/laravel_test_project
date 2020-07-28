@extends('layouts.admin')

@section('content')
    <h2>Редактировать профиль пользователя</h2>
    <form action="{{ route('admin.profiles.update', $user) }}" method="post" class="margin-bottom-30">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Имя пользователя</label>
            @error('name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    @if(old('name'))
                        value="{{ old('name') }}"
                    @else
                        value="{{ $user->name }}"
                    @endif
            >
        </div>

        <div class="form-group">
            <label>Почта пользователя</label>
            @error('email')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   @if(old('email'))
                   value="{{ old('email') }}"
                   @else
                   value="{{ $user->email }}"
                    @endif>
        </div>

        <div class="form-group">
            <label>Пароль пользователя</label>
                        @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
        </div>

        <div class="form-group">
            <label>Новый пароль пользователя</label>
                        @error('new_password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
            <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
        </div>

        <div class="form-group form-check">
            @error('is_admin')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input type="checkbox" class="form-check-input" name="is_admin">
            <label class="form-check-label">Сделать админом</label>
        </div>

        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection


