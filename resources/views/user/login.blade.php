@extends('layouts.main')

@section('title','Home page')

@section('content')
    <h1 class="h2">Login form</h1>

    <form action="{{ route('login.auth') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email"
            placeholder="Email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password"
            placeholder="Password">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" id="remember" name="remember" class="form-check-input">
            <label for="remember" class="form-check-label">Remeber me</label>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

        <a href="{{ route('password.request') }}" class="ms-2">Forogot password?</a>
    </form>
@endsection