<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;

Route::get('/', function () {
    $task = Task::orderBy('id', 'desc')->paginate(100);
    return view('index', ['tasks' => $task]);
})-> name ('tasks.index');
