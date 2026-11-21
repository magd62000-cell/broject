<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->search;

        $tasks = Task::when($search, function ($query) use ($search) {
            $query->where('task', 'like', '%' . $search . '%');
        })->get();

        return view('tasks.index', compact('tasks', 'search'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required'
        ]);

        Task::create([
            'task' => $request->task
        ]);

        return redirect()->route('tasks.index');
    }


    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required'
        ]);

        $task = Task::findOrFail($id);

        $task->update([
            'task' => $request->task
        ]);

        return redirect()->route('tasks.index');
    }

    
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->route('tasks.index');
    }
}
