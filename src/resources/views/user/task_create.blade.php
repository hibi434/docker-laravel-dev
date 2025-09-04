@extends('app')
@section('title')
    タスク追加画面
@endsection
@section('content')
<form action="{{ route("user_task_store") }}" method="POST">
    @csrf
    <label for="title">タイトル</label>
    <input type="text" name="title" id="title" value="{{ old('title') }}">
    
    <label for="description">詳細</label>
    <input type="text" name="description" id="description" value="{{ old('description') }}">
    
    <input type="submit" value="追加" class="btn btn-info">
    @if($errors->has('title'))
        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
    @endif
</form>
@endsection
