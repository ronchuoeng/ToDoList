<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(Request $request)
    {
        if (!$request->session()->has("tasks")) {
            $request->session()->put("tasks", []);
        }
        $tasks = $request->session()->get("tasks");

        return view('todo.index', compact("tasks"));
    }

    public function store(Request $request)
    {
        $todo_list = $request->session()->get("tasks");
        $todo_list[] = ["name" => $request["new_task"], "is_completed" => 0];
        $request->session()->put("tasks", $todo_list);

        return back();
    }

    public function update(Request $request)
    {
        $todo_list = $request->session()->get("tasks");
        $task_id = $request->task_id;
        $is_completed = $request->is_completed;

        $todo_list[$task_id]['is_completed'] = $is_completed;
        // Change the session data here
        $request->session()->put("tasks", $todo_list);

        return response()->json(['success' => true]);
    }

    public function reset(Request $request)
    {
        $request->session()->forget("tasks");
        return response()->json(["success" => true]);
    }

}