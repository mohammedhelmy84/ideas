@extends('layout.app')
@section('navbar')
@include('layout.nav')
@endsection
@section('content')
    <div class="row justify-content-center">
    
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('register') }}" method="post">
                @csrf
                <h3 class="text-center text-dark">Register</h3>
                <div class="form-group">
                    <label for="Name" class="text-dark">Name:</label><br>
                    <input type="text" name="name" id="Name" class="form-control">
                    @error('name')
                        <span class='d-block fs-6 text-danger mt-2'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="Email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="Email" class="form-control">
                    @error('email')
                        <span class='d-block fs-6 text-danger mt-2'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="text" name="password" id="password" class="form-control">
                    @error('password')
                        <span class='d-block fs-6 text-danger mt-2'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="Confirm Password" class="text-dark">Confirm Password:</label><br>
                    <input type="text" name="password_confirmation" id="Confirm_Password" class="form-control">
                    @error('password_confirmation')
                        <span class='d-block fs-6 text-danger mt-2'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                </div>
                <div class="text-right mt-2">
                    <a href="/login" class="text-dark">Login here</a>
                </div>
            </form>
        </div>
    </div>
@endsection
