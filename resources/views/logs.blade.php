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
                    <h1 class="mb-3">Team Logs</h1>
                    <h4 class="mb-3">Exportable in a scpecific time span as you wish</h4>
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
            <th>Finished at</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
            @if ($task->status == 'completed')
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->content }}</td>
                    <td>
                        @foreach($users->where('id',$task->assigned_to) as $user)
                            @if($user->id == $task->assigned_to)
                                {{ $user->username }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $task->deadline }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->finished_at }}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
<style>
    .date-b{
        width: 500px;
    }
</style>

    <div class="container date-b card my-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="my-4"><b>Export Completed Tasks</b></h2>

                <form action="{{ route('logs.export') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Export</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
