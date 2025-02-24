@extends('main')
@section('title', 'Register')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Register</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register.user') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputName" type="text" name="name" required autofocus placeholder="Enter your name">
                        <label for="inputName">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" type="email" name="email" required placeholder="name@example.com">
                        <label for="inputEmail">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputPassword" type="password" name="password" required placeholder="Create a password">
                        <label for="inputPassword">Password</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-block" type="submit">Register</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <div class="small"><a href="#">Already have an account? Login!</a></div>
            </div>
        </div>
    </div>
</div>
@endsection