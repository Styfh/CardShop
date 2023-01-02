@extends('master')

@section('title', 'Listings')

@section('style')
<style>
    main{
        padding: 5rem 5%;
    }
</style>
@endsection

@section('content')
<a href="/listing/create" class="btn btn-primary">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
    </svg>
    Create New
</a>

<div>
    @foreach ($listings as $listing)
        <div class="card flex-row">
            <div>
                <img src="{{ asset($listing->image) }}">
            </div>
            <div class="card-block">
                <h4>{{ $listing->name }}</h4>
            </div>
        </div>
    @endforeach
</div>

@endsection
