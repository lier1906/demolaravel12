<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index()
    {
        // Logic to display a list of tasks
        $tasks = Task::with('user')->get(); // Eager load the user relationship
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        // Logic to show the form for creating a new task
        return view('tasks.create', [
            'users' => User::all(), // Assuming you want to show all users for task assignment
        ]);
    }

    public function store(Request $request)
    {
        // Logic to store a new task
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id', // Assuming you want to assign the task to a user
        ]);
        $task = new Task();
        $task->name = $request->name;
        $task->user_id = $request->user_id; // Assign the selected user ID
        $task->save();
        // Validate and save the task
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        // Logic to display a specific task
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        // Logic to show the form for editing a specific task
        return view('tasks.edit', [
            'task' => $task,
            'users' => User::all(), // Assuming you want to show all users for task assignment
        ]);
    }

    public function update(Request $request, Task $task)
    {
        // Logic to update a specific task
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $task->name = $request->name;
        $task->save();
        // Validate and update the task
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        // Logic to delete a specific task
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
