@extends('layouts.main')
@section('title', 'Клиент ' . $client->email)
@section('content')
    <div class="client-wrapper">
        <h1>Клиент</h1>
        <div class="client-info-wrapper">
            <div>Имя</div>
            <div>{{$client->name}}</div>
        </div>
        <div class="client-info-wrapper">
            <div>Фамилия</div>
            <div>{{$client->lastName}}</div>
        </div>
        <div class="client-info-wrapper">
            <div>Телефон</div>
            <div>{{$client->phone}}</div>
        </div>
        <div class="client-info-wrapper">
            <div>E-mail</div>
            <div>{{$client->email}}</div>
        </div>
        <div class="client-comments-wrapper">
            <h2>Комментарии</h2>
            @foreach($comments as $index => $comment)
                <div class="client-comment-wrapper">
                    <div><h3>Комментарий №{{$index+1}}</h3> — {{$comment->created_at}}</div>
                    {{$comment->comment}}
                </div>
            @endforeach
            <div class="client-add-comment-wrapper">
                <form action="{{route('client.update', ['client' => $client])}}" method="post" class="comment-form">
                    @method('PUT')
                    @csrf
                    <label for="comment">Добавить комментарий:</label>
                    <textarea name="comment" id="comment" required>{{old('comment')}}</textarea>
                    <div class="error-wrapper" id="comment-error">{{$errors->first('comment')}}</div>
                    <input type="submit" value="Добавить">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('scripts/clientEdit.js')}}"></script>
@endsection
