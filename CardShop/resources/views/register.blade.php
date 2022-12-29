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
<h3 class="text-center mb-5">Register</h3>
<div class="card">
    <form action="">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control" id="address" rows="5"></textarea>
        </div>
        <div class="mb-4">
            <label for="profile_picture" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" name="profile_picture" id="profile_picture">
        </div>
        <input type="submit" class="form-control mb-4" value="Register">
        <p class="text-center">Already have an account? login <a href="/login">here</a></p>
    </form>
</div>
@endsection
