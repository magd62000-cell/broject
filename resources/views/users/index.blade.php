@extends('layouts.app')

@section('title', 'Users Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0">Users Management</h1>
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
                <i class="fas fa-user-plus me-2"></i>
                Add New User
            </div>

            <div class="card-body">

                <form action="{{ route('users.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="Enter user name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control"
                               placeholder="Enter email address" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control"
                               placeholder="Enter password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-plus me-1"></i>
                        Add User
                    </button>

                </form>

            </div>

        </div>

    </div>

    <div class="col-lg-8">

        <div class="card shadow mb-4">

            <div class="card-header">
                <i class="fas fa-users me-2"></i>
                Users List
            </div>

            <div class="card-body">

                <form action="{{ route('users.index') }}" method="GET" class="mb-4">

                    <div class="input-group">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search by name or email..."
                            value="{{ $search ?? '' }}"
                        >

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                            Search
                        </button>

                        @if(!empty($search))
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($users as $user)

                                <tr>
                                    <td>{{ $user->id }}</td>

                                    <td>
                                        <i class="fas fa-user-circle text-primary me-2"></i>
                                        {{ $user->name }}
                                    </td>

                                    <td>{{ $user->email }}</td>

                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}"
                                           class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('users.destroy', $user->id) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this user?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>

                                        </form>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        No users found.
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
