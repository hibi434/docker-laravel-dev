<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class ApiController extends Controller
{
    public function checkUser($name, $password)
    {
        $user = User::where("name", $name)->first();
        if ($user && Hash::check($password, $user->password)) {
            return true;
        }
        return false;
    }

    public function getApi(Request $request)
    {
        $check = $this->checkUser($request->name, $request->password);
        if ($check) {
            $task = Task::get();
            return response()->json($task);
        }
        return response()->json(["エラー" => "そのアカウントは登録されていません"]);
    }

    public function postApi(Request $request)
    {
        $check = $this->checkUser($request->name, $request->password);
        if ($check) {
            if (!$request->title) {
                return response()->json(["エラー" => "タイトルが入力されていません"], 200);
            }
            if (!$request->author_id) {
                return response()->json(["エラー" => "idが入力されていません"], 404);
            }
            Task::query()->create([
                "title" => $request->title,
                "description" => $request->description ? $request->description : null,
                "author_id" => $request->author_id
            ]);
            return response()->json(["メッセージ" => "成功しました"], 200);
        }
        return response()->json(["エラー" => "アカウントがありません"], 404);
    }
    public function putApi(Request $request, string $id)
    {
        $check = $this->checkUser($request->name, $request->password);
        if ($check) {
            $task = Task::find($id);
            if ($request->title) {
                $task->update([
                    "title" => $request->title
                ]);
            }
            if ($request->description) {
                $task->update([
                    "description" => $request->description
                ]);
            }
            if ($request->completed) {
                $task->update([
                    "completed" => $request->completed
                ]);
            }
            return response()->json(["メッセージ" => "成功しました"], 204);
        }
        return response()->json(["エラー" => "アカウントがありません"], 404);
    }

    public function deleteApi(Request $request, string $id)
    {
        $check = $this->checkUser($request->name, $request->password);
        if ($check) {
            $task = Task::find($id);
            $task->delete();
            return response()->json(["メッセージ" => "成功しました"], 200);
        }
        return response()->json(["エラー" => "アカウントがありません"], 404);
    }

    public function completeApi(Request $request, string $id)
    {
        $check = $this->checkUser($request->name, $request->password);
        if ($check) {
            $task = Task::find($id);
            $task->update(["completed" => true]);
            return response()->json(["メッセージ" => "成功しました"], 204);
        }
        return response()->json(["エラー" => "アカウントがありません"], 404);
    }

    public function uncompleteApi(Request $request, string $id)
    {
        $check = $this->checkUser($request->name, $request->password);
        if ($check) {
            $task = Task::find($id);
            $task->update(["completed" => false]);
            return response()->json(["メッセージ" => "成功しました"], 204);
        }
        return response()->json(["エラー" => "アカウントがありません"], 404);
    }
}