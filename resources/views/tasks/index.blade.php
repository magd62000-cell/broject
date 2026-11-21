@extends('layouts.app')

@section('title', 'Tasks Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0">Tasks Management</h1>
    <span class="text-muted">{{ date('d M Y') }}</span>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">

    <div class="col-lg-4">

        <div class="card shadow mb-4">

            <div class="card-header">
                <i class="fas fa-plus-circle me-2"></i>
                Add New Task
            </div>

            <div class="card-body">

                <form action="{{ route('tasks.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Task Name</label>

                        <input
                            type="text"
                            name="task"
                            class="form-control"
                            placeholder="Enter a new task"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-plus me-1"></i>
                        Add Task
                    </button>

                </form>

            </div>

        </div>

    </div>

    <div class="col-lg-8">

        <div class="card shadow mb-4">

            <div class="card-header">
                <i class="fas fa-list-check me-2"></i>
                Current Tasks
            </div>

            <div class="card-body">

                <form action="{{ route('tasks.index') }}" method="GET" class="mb-4">

                    <div class="input-group">
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search tasks..."
                            value="{{ $search ?? '' }}"
                        >

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                            Search
                        </button>

                        @if(!empty($search))
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i>
                                Clear
                            </a>
                        @endif
                    </div>

                </form>

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Task</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($tasks as $task)

                                <tr>

                                    <td>{{ $task->id }}</td>

                                    <td>
                                        <i class="fas fa-tasks text-primary me-2"></i>
                                        {{ $task->task }}
                                    </td>

                                    <td>

                                        <a
                                            href="{{ route('tasks.edit', $task->id) }}"
                                            class="btn btn-warning btn-sm"
                                        >
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('tasks.destroy', $task->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this task?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        No tasks found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
