@extends('app')
@section('title')
    ログイン画面
@endsection
@section('content')
<h1>ログイン画面</h1>
<form action="{{route('check')}}" method="POST">
    @csrf
    <label for="name">ユーザー名</label>
    <input type="text" name="name" id="name">
    <label for="password">パスワード</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="ログイン" class="btn btn-info">
    @if(session('message'))
        <div class="alert alert-danger">{{session('message')}}</div>
    @endif
</form>
@endsection