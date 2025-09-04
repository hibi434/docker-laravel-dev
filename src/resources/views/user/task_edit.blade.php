@extends('app')
@section('title')
    タスク編集画面
@endsection
@section('content')
<form action="{{ route("user_task_update",$task->id)}}" method="POST">
    @csrf
    <label for="title">タイトル</label>
    <input type="text" name="title" id="title" value="{{$task->title}}">
    <label for="description">詳細</label>
    <input type="text" name="description" id="description" value="{{$task->description}}">
    <label for="completed">完了</label>
    <input type="checkbox" name="completed" id="completed" {{ $task->completed ? 'checked' : '' }}>
    <input type="submit" value="編集" class="btn btn-success">
      @if($errors->has('title'))
        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
    @endif
</form>
@endsection