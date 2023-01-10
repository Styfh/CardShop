@extends('master')

@section('title', 'Listing')

@section('style')
<style>
    main{
        padding: 5rem 5%;
    }
</style>
@endsection

@section('content')

<h3 class="text-center mb-3">{{ $listing->name }}</h3>

<div class="card d-flex flex-row">

    <div>
        <img src="{{ asset("storage/$listing->image") }}">
    </div>

</div>

@endsection
