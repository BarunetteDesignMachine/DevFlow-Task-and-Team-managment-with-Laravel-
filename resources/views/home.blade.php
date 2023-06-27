@extends('layout/header')

@section('content')
    <style>
        .card-b{
            margin-bottom: 100px;
            margin-top: 100px;
        }

    </style>
    <body style="background-color: #b9b9b9;">
    <div class="card-b">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if (auth()->user())
                        <h1 class="display-4"><b>This is DevFlow</b></h1>
                        <h3 class="">I'm The {{ auth()->user()->role }}</h3>
                    @else
                        <h1 class="display-4"><b>This is DevFlow</b></h1>
                    @endif
                    @if (auth()->user() && auth()->user()->role === null)
                        <h1 class="display-4">One Step Closer</h1>
                    @endif
                    <p>Your tasks, your way.</p>
                    <a href="/login" class="btn btn-primary">Start your journey</a>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">
                <i class="fa fa-tasks"></i> What we do in DevFlow:
            </h1>
            <p class="lead">
                DevFlow is a free online tool that helps you manage your tasks and projects. It's easy to use and has no limits on the number of tasks or projects you can create. You can track tasks from beginning to end, delegate subtasks to teammates, set deadlines, and collaborate on projects in real time.
            </p>
        </div>
    </div>
    </body>
@endsection
