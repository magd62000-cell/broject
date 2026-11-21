@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0">Dashboard</h1>
    <span class="text-muted">{{ date('d M Y') }}</span>
</div>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start border-primary border-4 shadow h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-primary text-uppercase fw-bold small mb-2">
                            Total Tasks
                        </div>
                        <div class="h3 fw-bold text-dark mb-0">
                            {{ $tasksCount }}
                        </div>
                    </div>

                    <i class="fas fa-tasks fa-3x text-secondary opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start border-success border-4 shadow h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-success text-uppercase fw-bold small mb-2">
                            Total Users
                        </div>
                        <div class="h3 fw-bold text-dark mb-0">
                            {{ $usersCount }}
                        </div>
                    </div>

                    <i class="fas fa-users fa-3x text-secondary opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start border-info border-4 shadow h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-info text-uppercase fw-bold small mb-2">
                            Project Status
                        </div>
                        <div class="h5 fw-bold text-dark mb-0">
                            Active
                        </div>
                    </div>

                    <i class="fas fa-project-diagram fa-3x text-secondary opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start border-warning border-4 shadow h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-warning text-uppercase fw-bold small mb-2">
                            System
                        </div>
                        <div class="h5 fw-bold text-dark mb-0">
                            Online
                        </div>
                    </div>

                    <i class="fas fa-server fa-3x text-secondary opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-lg-8">

        <div class="card shadow mb-4">

            <div class="card-header">
                <i class="fas fa-chart-area me-2"></i>
                Project Overview
            </div>

            <div class="card-body">

                <h4 class="fw-bold text-dark mb-3">
                    Welcome to SB Admin 2
                </h4>

                <p class="text-muted">
                    Manage your tasks and users from one place.
                    Monitor your project and keep everything organized.
                </p>

                <a href="{{ route('tasks.index') }}" class="btn btn-primary me-2">
                    <i class="fas fa-tasks me-1"></i>
                    Manage Tasks
                </a>

                <a href="{{ route('users.index') }}" class="btn btn-success">
                    <i class="fas fa-users me-1"></i>
                    Manage Users
                </a>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card shadow mb-4">

            <div class="card-header">
                <i class="fas fa-info-circle me-2"></i>
                System Information
            </div>

            <div class="card-body">

                <p class="mb-3">
                    <strong>Application:</strong>
                    <span class="text-muted">SB Admin 2</span>
                </p>

                <p class="mb-3">
                    <strong>Framework:</strong>
                    <span class="text-muted">Laravel</span>
                </p>

                <p class="mb-3">
                    <strong>Database:</strong>
                    <span class="text-muted">SQLite</span>
                </p>

                <p class="mb-0">
                    <strong>Status:</strong>
                    <span class="badge bg-success">Online</span>
                </p>

            </div>

        </div>

    </div>

</div>

@endsection
