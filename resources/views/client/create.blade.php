@extends('layouts.main')
@section('title', $title)
@section('content')
    <div class="form-wrapper">
        <h1>Оставьте заявку</h1>
        <form action="{{route('client.store')}}" method="post" class="client-form">
            @csrf
            <div class="input-error-wrapper">
                <div class="input-wrapper"><label for="name">Имя</label><input type="text" id="name"
                                                                               name="name"
                                                                               pattern="[A-Za-zА-Яа-я\s\'-]+"
                                                                               placeholder="Иван"
                                                                               value="{{old('name')}}"
                                                                               required>
                </div>
                <div class="error-wrapper" id="name-error">{{$errors->first('name')}}</div>
            </div>
            <div class="input-error-wrapper">
                <div class="input-wrapper"><label for="lastName">Фамилия</label><input type="text" id="lastName"
                                                                                       name="lastName"
                                                                                       pattern="[A-Za-zА-Яа-я\s\'-]+"
                                                                                       placeholder="Петров"
                                                                                       value="{{old('lastName')}}"
                                                                                       required>
                </div>
                <div class="error-wrapper" id="last-name-error">{{$errors->first('lastName')}}</div>
            </div>
            <div class="input-error-wrapper">
                <div class="input-wrapper"><label for="phone">Телефон</label><input type="tel" id="phone"
                                                                                    name="phone"
                                                                                    pattern="[0-9+\-()]+"
                                                                                    placeholder="+79129313212"
                                                                                    value="{{old('phone')}}"
                                                                                    max="19"
                                                                                    required>
                </div>
                <div class="error-wrapper" id="phone-error">{{$errors->first('phone')}}</div>
            </div>
            <div class="input-error-wrapper">
                <div class="input-wrapper"><label for="email">E-mail</label><input type="email" id="email"
                                                                                   name="email"
                                                                                   pattern="\S+@\S+\.[a-zA-Z]{2,}"
                                                                                   placeholder="petrov.ivan@example.com"
                                                                                   value="{{old('email')}}"
                                                                                   required>
                </div>
                <div class="error-wrapper" id="email-error">{{$errors->first('email')}}</div>
            </div>
            <input type="submit" value="Отправить">
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('scripts/client.js')}}"></script>
@endsection

