@extends('app')
@section('title')
    ホーム画面
@endsection
@section('content')
    <div class="d-flex">
        <h1 class="flex-grow-1">ホーム画面</h1>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" value="ログアウト" class="btn btn-outline-danger">
        </form>
        <form action="{{ route('user_task_create') }}" method="get">
            <input type="submit" value="新規作成" class="btn btn-primary">
        </form>
    </div>
    <table class="table">
        <tr>
            <th>タイトル</th>
            <th>説明文</th>
            <th></th>
            <th></th>
            <th></th>

            @foreach ($tasks as $item)
        <tr>
            <td>
                <span class="{{ $item->completed ? 'text-decoration-line-through' : '' }}">
                    {{ $item->title }}
                </span>
            </td>
            <td>
                <span class="{{ $item->completed ? 'text-decoration-line-through' : '' }}">
                    {{ $item->description }}
                </span>
            </td>
            <td>
                <form action="{{ route('user_task_delete', $item->id) }}" method="post">
                    @csrf
                    <button class="btn btn-danger">削除</button>
                </form>
            </td>
            <td>
                <a href="{{ route('user_task_edit', $item->id) }}" class="btn btn-success">編集</a>
            </td>
        </tr>
        @endforeach
        </tr>
    </table>
@endsection
