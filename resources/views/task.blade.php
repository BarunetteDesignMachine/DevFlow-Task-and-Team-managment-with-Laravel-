@extends('layout/header')

@section('content')
    <!-- Jumbotron -->
    <div class="p-5 text-center bg-image rounded-3" style="
    background-image: url('https://pmaspire.com/wp-content/themes/pmaspire_wp/assets/images/header-banner.jpg');
    height: 400px;
  ">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3">Team Tasks</h1>
                    <h4 class="mb-3">Listed according to the id of the team member that should attend the task.</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->

<div class="container my-4">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Assigned to</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
            @if ($task->status == 'assigned' || $task->status == 'in progress')
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->content }}</td>
                    <td>@foreach($users->where('id',$task->assigned_to) as $user)
                            @if($user->id == $task->assigned_to)
                                {{ $user->username }}
                            @endif
                        @endforeach</td>
                    <td>{{ $task->deadline }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        <a href="{{ route('task.complete', $task->id) }}" class="btn btn-success"
                           @if (Auth::user()->id === $task->assigned_to)
                               onclick="return confirm('Are you sure you want to complete this task?')"
                           @else
                               onclick="alert('This is not your task to complete.'); return false;"
                            @endif>
                            Completed
                        </a>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
@endsection
