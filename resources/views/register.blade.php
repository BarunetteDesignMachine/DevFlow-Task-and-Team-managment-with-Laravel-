@extends('layout/header')

@section('content')
<style>
    .card-s{
        width: 550px;
    }
</style>
<div class=" container card bg-light card-s my-5">
    <form method="POST" action="{{ route('registerp') }}" enctype="multipart/form-data" class="mt-3">
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
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-image"></i> </span>
            </div>
            <input type="file" class="form-control" name="image" accept="image/*">
            <img style="max-width: 100px;" src="" alt="">
        </div> <!-- form-group// -->
        <div class="form-group">
            <label>email</label>
            <input type="email" class="form-control" name="email">
        </div> <!-- form-group// -->
        <div class="form-group">
            <label>phone</label>
            <input type="number" class="form-control" name="phone_number">
        </div> <!-- form-group// -->
        <div class="form-group">
            <label>contact</label>
            <input type="text" class="form-control" name="contact">
        </div> <!-- form-group// -->
        <div class="form-group">
            <label>group id</label>
            <input type="number" class="form-control" name="group_id">
        </div> <!-- form-group// -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Register </button>
        </div> <!-- form-group// -->
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

</div>

@endsection
