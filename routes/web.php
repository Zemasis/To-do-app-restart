<?php

use Illuminate\Support\Facades\Route;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

Route::get('/', function () {
    $task = Task::orderBy('id', 'desc')->paginate(10);
    return view('index', ['tasks' => $task]);
})-> name ('tasks.index');


Route::get('/tasks/create', function () {
    return view('create');
})-> name ('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);
    return view('detail', ['task' => $task]);
})-> name ('tasks.detail');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->all());
    return redirect()->route('tasks.index')->with('success', 'Task created successfully');
})-> name ('tasks.store');

Route::get('/tasks/{id}/edit', function ($id) {
    $task = Task::findOrFail($id);
    return view('edit', ['task' => $task]);
})-> name ('tasks.edit');

Route::put('/tasks/{id}', function (TaskRequest $request, $id) {
    $task = Task::findOrFail($id);
    $task->update($request->all());
    return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
})-> name ('tasks.update');

Route::delete('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
})-> name ('tasks.delete');


Route::put('/tasks/{id}/completed', function ($id) {
    $task = Task::findOrFail($id);
    $task->completed = true;
    $task->save();
    return redirect()->route('tasks.index')->with('success', 'Task completed successfully');
})-> name ('tasks.completed');


