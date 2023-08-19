@extends('layouts.main')
@section('title', 'Вход в систему')
@section('content')
    <div class="form-wrapper">
        <h1>Вход</h1>
        <form action="{{route('login.check')}}" method="post" class="client-form login-form">
            @csrf
            <div class="input-error-wrapper">
                <div class="input-wrapper">
                    <label for="username">Логин</label>
                    <input type="text" id="username" name="username" required value="{{old('username')}}">
                </div>
                <div class="error-wrapper" id="username-error">{{$errors->first('username')}}</div>
            </div>
            <div class="input-error-wrapper">
                <div class="input-wrapper">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="error-wrapper" id="password-error">{{$errors->first('password')}}</div>
            </div>
            <input type="submit" value="Войти">
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('scripts/login.js')}}"></script>
@endsection
