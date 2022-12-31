@extends('master')

@section('title', 'Profile')

@section('style')
<style>
    main{
        padding: 7.5rem 30%;
    }

    .profile-pic{
        width: 25vw;
        height: 25vw;
    }

</style>
@endsection

@section('content')
<div class="card p-4">
    <div class="mx-auto">
       <img src="{{ asset('storage/user_profile_pics/'.$user->profile_picture) }}" class="rounded-circle profile-pic">
    </div>
    <div>
        <div class="my-5">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" disabled value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" disabled value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control" id="address" rows="5" disabled>{{ $user->address }}
                </textarea>
            </div>
        </div>
    </div>
</div>
@endsection
