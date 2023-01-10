@extends('master')

@section('title', 'Listing')

@section('content')

<h3 class="text-center">{{ $listing->name }}</h3>

<div class="card d-flex flex-row">

    <div>
        <img src="{{ asset("storage/$listing->image") }}">
    </div>

</div>

@endsection
