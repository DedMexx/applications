@extends('layouts.main')
@section('title', $title)
@section('content')
    <div class="list-wrapper">
        <div class="list-header">
            <div class="list-id">ID</div>
            <div class="list-name">Имя</div>
            <div class="list-lastname">Фамилия</div>
            <div class="list-phone">Телефон</div>
            <div class="list-email">E-mail</div>
            <div class="list-date">Дата</div>
            <div class="list-comment">Комментарии</div>
        </div>
        @foreach($clients as $client)
            <div class="list-item">
                <div class="list-id">{{$client->id}}</div>
                <div class="list-name">{{$client->name}}</div>
                <div class="list-lastname">{{$client->lastName}}</div>
                <div class="list-phone">{{$client->phone}}</div>
                <div class="list-email">{{$client->email}}</div>
                <div class="list-date">{{$client->created_at}}</div>
                <div class="list-comment">
                    <a href="{{route('client.edit', ['client' => $client])}}">Перейти к комментариям</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
