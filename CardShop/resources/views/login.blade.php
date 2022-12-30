@extends('master')

@section('title', 'Register')

@section('style')
<style>
    main{
        padding: 7.5rem 30%;
    }
    .card{
        padding: 1.5rem 2.5rem;
    }
</style>
@endsection

@section('content')
<h3 class="text-center mb-5">Login</h3>
<div class="card">
    @include('components.error')
    <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
          </div>
        <input type="submit" class="form-control mb-4" value="Login">
        <p class="text-center">Don't have an account? Register <a href="/register">here</a></p>
    </form>
</div>
@endsection
