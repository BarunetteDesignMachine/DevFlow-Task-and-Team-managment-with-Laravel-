

@extends('layout/header')

@section('content')
<div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Log-in DevFlow</h4>
        <p class="text-center">Get started with your journey of working together</p>
        <form method="POST" action="{{ route('login.process') }}" class="mt-3">
            @csrf
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div> <!-- form-group// -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Login </button>
            </div> <!-- form-group// -->
            <p class="text-center">Don't Have an account? <a href="/register">Register</a> </p>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </article>
</div> <!-- card.// -->
<div class="container">
    <div class="row">
        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
            <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden col-md-6">
                <div class="my-3 py-3">
                    <h2 class="display-5">Team Up!!!</h2>
                    <p class="lead">Teamwork is essential in programming and many other professions. By working together, teams can share knowledge, ideas, and skills to create better products and services.</p>
                </div>
            </div>
            <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden col-md-6">
                <div class="my-3 p-3">
                    <h2 class="display-5">Set , Ready , Task</h2>
                    <p class="lead">this is the task manager of a life time, with exceptional features you are free to compose and work with desired team.</p>
                </div>
            </div>
        </div>
    </div>

</div>

</section>
@endsection
