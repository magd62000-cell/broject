@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

<h1 class="page-title">Edit Task</h1>

<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="card shadow">

            <div class="card-header">
                <i class="fas fa-edit me-2"></i>
                Update Task Information
            </div>

            <div class="card-body">

                <form action="{{ route('tasks.update', $task->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label fw-bold">Task Name</label>

                        <input
                            type="text"
                            name="task"
                            class="form-control"
                            value="{{ $task->task }}"
                            placeholder="Enter task name"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>
                        Update Task
                    </button>

                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>
                        Back
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
