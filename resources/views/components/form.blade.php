@extends('layouts.app')
@section('title',isset($task)?'Update Task':'Create new task')
@section('style')
    .alert-danger {
        color: red;
    }
@endsection


@section('content')
    <form action="{{isset($task)? route('tasks.update',['id'=>$task->id]):route('tasks.store')}}" method="post">

        @csrf
        @if (isset($task))
            <h3>Number {{$task->id}}</h3>
            @method('PUT')
        @else
        @endif

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{old('name',$task->name ?? '')}}">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{old('description',$task->description ?? '')}}">
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="state">State</label>
        <input type="text" name="state" id="state" value="{{old('state',$task->state ?? '')}}">
        @error('state')
            <div class="alert alert-danger">{{ $message }}</div>

        @enderror
        <button type="submit">@isset($task)Update @else Create @endisset</button>
    </form>
@endsection


