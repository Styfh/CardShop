@extends('master')

@section('title', 'Profile')

@section('style')
<style>
    main{
        padding: 7.5rem 30%;
    }
</style>
@endsection

@section('content')
<div>
   <img src="{{ asset('storage/user_profile_pics/'.$user->profile_picture) }}" alt="">
</div>
@endsection
