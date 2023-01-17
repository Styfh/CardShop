@extends('master')

@section('title', 'Listing')

@section('style')
<style>
    main{
        padding: 5rem 15%;
    }

    .listing-detail{
        padding: 2rem;
    }

    main img{
        height: 20rem;
    }

</style>
@endsection

@section('content')

<h3 class="text-center mb-3">{{ $listing->name }}</h3>

<div class="card d-flex flex-row">

    <div>
        <img src="{{ asset("storage/$listing->image") }}">
    </div>

    <div class="listing-detail">
        <p class="card-text">Series: {{ $listing->series->name }}</p>
        <p class="card-text">Lister: {{ $listing->lister->name }}</p>
        <p class="card-text">Stock: {{ $listing->stock }}</p>
        <strong>
            <p>Price: IDR {{ $listing->individual_price }}</p>
        </strong>
        <p class="card-text">Description:<br>{{ $listing->description }}</p>

        @auth
        @if (Auth::id() != $listing->lister_id)
        <form action="/cart/add/{{ $listing->id }}" method="POST">
            @csrf
            <div class="d-flex flex-row">
                <input type="number" name="amount" class="form-control">
                <input type="submit" value="Add to Cart" class="form-control btn btn-primary w-50 mx-3">
            </div>
        </form>
        @endif
        @endauth
    </div>

</div>

@endsection
