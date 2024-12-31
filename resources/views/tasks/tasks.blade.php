@extends('layouts.home')

@section('content')
    <main class="flex-shrink-0 mt-5">
        <div class="container" style="max-width: 600px">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @foreach ($tasks as $task)
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <h6 style="font-size: 26px" class="border-bottom pb-2 mb-0">Tasks</h6>
                    <div class="d-flex text-body-secondary pt-3" style='gap:12px'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-stack">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 6l-8 4l8 4l8 -4l-8 -4" />
                            <path d="M4 14l8 4l8 -4" />
                        </svg>
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark" style="font-size: 18px">{{ $task->title }}</strong>
                                <div>
                                    <form action="{{ route('task.status.update', $task->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l5 5l10 -10" />
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('task.delete', $task->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M18 6l-12 12" />
                                                <path d="M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <strong class="text-gray-dark" style="font-size: 16px">{{ $task->deadline }}</strong>
                            <span class="d-block" style="font-size: 16px">{{ $task->description }}</span>
                        </div>
                    </div>
                    <small class="d-block text-end mt-3">
                        <a href="#" style="text-decoration: none">Add tasks</a>
                    </small>
                </div>
            @endforeach
        </div>
    </main>
@endsection
