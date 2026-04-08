@extends('layouts.main')

@section('title','Home page')

@section('content')

    <div class="alert alert-info" role="alert">
        Thanks you registered! A link to confirm registration has been sent to
        your email.
    </div>
        Didn't receive the link?
        <form method="post" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-link ps-0">Send link</button>
        </form>
        
@endsection