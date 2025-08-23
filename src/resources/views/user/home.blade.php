@extends('app')
@section('title')
    ホーム画面
@endsection
@section('content')
<h1>ホーム画面</h1>
<form action="{{route('logout')}}" method="post">
    @csrf
    <input type="submit" value="ログアウト" class="btn btn-outline-danger">
</form>
@endsection