<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = Task::all();
        return view('user.home', compact('tasks'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.task_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ], [
            'title.required' => '入力必須です',
        ]);
        Task::query()->create([
            'title' => $request->title,
            'description' => $request->description ? $request->description : null,
            'author_id' => Auth::user()->id
        ]);
        return redirect(route("user_home"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $task = Task::query()->find($id);
        return view('user.task_edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'required',
        ], [
            'title.required' => '入力必須です',
        ]);
        $task = Task::query()->find($id);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed == 'on' ? 1 : 0
        ]);
        return redirect(route('user_home'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $task = Task::query()->find($id);
        $task->delete();
        return redirect(route('user_home'));
    }
}
