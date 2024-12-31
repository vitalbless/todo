@extends('layouts.home')

@section('content')
    <div class="d-flex align-items-center">
        <div class="container card shadow-sm" style="max-width: 500px;margin-top:100px">
            <h1 class="fs-3 fw-bold" style="text-align: center;margin-top:10px">Add Task</h1>
            <form class="p-3 " method="POST" action="{{ route('task.add.post') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="datetime-local" name="deadline">
                </div>
                <div class="mb-3">
                    <textarea placeholder="Description" name="description" class="form-control" rows="3"></textarea>
                </div>
                <button class="btn btn-primary rounded:pill" type="submit">Create task</button>
            </form>
        </div>
    </div>
@endsection
