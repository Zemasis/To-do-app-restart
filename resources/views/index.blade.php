@extends('layouts.app')
@section('title', 'To do app Remastered')

 @section('content')

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<div class="mb-4">
    <a class="form-medium text-gray-700 underline decoration-black-500"
    href="{{route('tasks.create')}}">Create new task</a>

</div>
<table class="table-auto">
    <tr>
        <th>Task</th>
        <th>Name</th>
        <th>Description</th>
        <th>State</th>
        <th>Action</th>
    </tr>
    <tr>
        {{-- @if (isset($tasks) && count($tasks) > 0) --}}
        @if (count($tasks) >= 0)
            @foreach ($tasks as $task)
            <tr>
            {{-- phần tử của 1 list --}}
                <td>{{$task->id}}</td>
                <td>{{$task->name}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->state}}</td>

                <td>
                    <form action="{{ route('tasks.completed', ['id' => $task->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit">{{$task->completed!=true?'Complete':'Uncomplete'}}</button>
                    </form>

                    <a href="{{ route('tasks.detail', ['id' => $task->id]) }}">Detail</a>
                    <a href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit</a>
                    <form action="{{ route('tasks.delete', ['id' => $task->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>

            </tr>
            @endforeach

        @else
            <tr>
                <td colspan="5">No tasks found</td>
            </tr>
        @endif

    </tr>
</table>
@if ($tasks->count())
    <nav>
        {{ $tasks->links() }}
    </nav>
@endif
@endsection

