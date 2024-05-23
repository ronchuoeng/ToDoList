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
        // create tasks if not existing
        if (!$request->session()->has("tasks")) {
            $request->session()->put("tasks", []);
        }
        $tasks = $request->session()->get("tasks");

        return view('todo.index', compact("tasks"));
    }

    public function store(Request $request)
    {
        $todo_list = $request->session()->get("tasks");

        // get request data
        $new_task = ["name" => $request["new_task"], "is_completed" => 0];

        // append at front of array
        array_unshift($todo_list, $new_task);

        $request->session()->put("tasks", $todo_list);

        return back();
    }

    public function update(Request $request)
    {
        $todo_list = $request->session()->get("tasks");

        // get request data
        $task_id = $request->task_id;
        $is_completed = $request->is_completed;

        // change value
        $todo_list[$task_id]['is_completed'] = $is_completed;

        // update
        $request->session()->put("tasks", $todo_list);

        return response()->json(['success' => true]);
    }

    public function remove(Request $request)
    {

        $todo_list = $request->session()->get("tasks");

        // get request data
        $task_id = $request->task_id;

        // remove array by id
        unset($todo_list[$task_id]);

        // update
        $request->session()->put("tasks", $todo_list);

        return response()->json(["success" => true]);
    }

    public function reset(Request $request)
    {
        $request->session()->forget("tasks");
        return response()->json(["success" => true]);
    }

}