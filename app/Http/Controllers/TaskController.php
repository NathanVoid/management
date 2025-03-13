<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskAssignedMail;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $users = User::where('role', 'user')->get();
            return view('tasks.admin_index', compact('users'));
        } else {
            $tasks = Task::where('user_id', $user->id)->where('status', 'pending')->get();
            return view('tasks.user_index', compact('tasks'));
        }
    }

    public function store(Request $request)
    {
        $task = Task::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => 'pending',
        ]);

        Mail::to($task->user->email)->send(new TaskAssignedMail($task));

        return response()->json(['success' => true]);
    }

    public function update(Task $task)
    {
        $task->update(['status' => 'completed']);
        return response()->json(['success' => true]);
    }
}
