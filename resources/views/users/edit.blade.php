@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

<h1 class="page-title">Edit User</h1>

<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="card shadow">

            <div class="card-header">
                <i class="fas fa-user-edit me-2"></i>
                Update User Information
            </div>

            <div class="card-body">

                <form action="{{ route('users.update', $user->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ $user->name }}"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ $user->email }}"
                            required
                        >
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">New Password (Optional)</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Leave empty to keep current password"
                        >
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>
                        Update User
                    </button>

                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>
                        Back
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
