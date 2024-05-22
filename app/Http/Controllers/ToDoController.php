<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ToDoController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index()
    {
        return view('todo.index');
    }
}