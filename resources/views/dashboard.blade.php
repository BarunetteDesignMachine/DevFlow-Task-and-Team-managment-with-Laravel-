@extends('layout/header')

@section('content')
    <!-- Jumbotron -->
    <div class="p-4 shadow-4 rounded-3" style="background-color: hsl(0, 0%, 94%);">
        <h1><b>Dashboard</b></h1>
        <p>
            Manage your account and tasks all in one place.
        </p>

        <hr class="my-4" />

        <div class="card">
            <div class="card-header" style="background-color: #f7f7f7;">
                <h3 style="color: #333;"><b>User Information</b></h3>
            </div>
            <div class="card-body">
                <img src="{{ Storage::url(Auth::user()->image, null) }}" alt="User avatar" class="rounded-circle" width="100" height="100">
                <h5 class="card-title" style="color: #333;">{{ Auth::user()->name }}</h5>
                <p class="card-text" style="color: #333;">
                    <strong>Email:</strong> {{ Auth::user()->email }}<br>
                    <strong>Username:</strong> {{ Auth::user()->username }}<br>
                    <strong>Role:</strong> {{ Auth::user()->role }}
                </p>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->

<div class="container">
    <div class="row">
        <div class="col-md-6 card my-3">
            <h2><b><i class="fa fa-tasks"></i> Tasks</b></h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Due Date</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($tasks as $task)
                    @if ($task->group_id == Auth::user()->group_id)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->deadline }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        @if (Auth::user() && Auth::user()->role == 'admin' || Auth::user()->role == 'senior dev')
        <div class="col-md-6 card my-3">
            <h2><b><i class="fa fa-user"></i> Users waiting for a role</b></h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Select Role</th>
                    <th>Submit</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    @if ($user->role == null)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('role.update', $user->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">

                                    <select name="role" id="role-{{ $user->id }}" class="form-control">
                                        @foreach ($roles as $role)
                                            <option
                                                value="{{ $role }}" {{ $user->role == $role ? 'selected' : '' }}>{{ $role }}</option>
                                        @endforeach
                                    </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@if (Auth::user() && Auth::user()->role == 'admin' || Auth::user()->role == 'senior dev')
<div class="container">
    <div class="row">
        <div class="col-md-6 card my-2">
            <h2><b><i class="fa fa-users"></i> Users</b></h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    @if ($user->role != null)
                        @if ($user->role != 'admin')
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                        </tr>
                        @endif
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6 card my-2">
            <h2><b><i class="fa fa-check"></i> Create Task</b></h2>
            <h5>(only Admins and senior Devs)</h5>
            <form action="{{ route('create.task') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="assigned_to">Assigned to</label>
                    <select name="assigned_to" id="assigned_to" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline" id="deadline" class="form-control">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="assigned">Assigned</option>
                        <option value="in progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Task</button>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
