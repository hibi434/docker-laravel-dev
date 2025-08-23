@extends('app')
@section('title')
    アカウント登録
@endsection
@section('content')
<h1>アカウント登録画面</h1>
<form action="{{route('user_store')}}" method="POST">
    @csrf
    <label for="name">ユーザー名</label>
    <input type="text" name="name" id="name">
    <label for="password">パスワード</label>
    <input type="text" name="password" id="password">
    <input type="submit" value="新規登録" class="btn btn-info">
    @if($errors->first())
        <div class="alert alert-danger">{{$errors->first()}}</div>
    @endif
</form>
@endsection