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
        <p class="card-text">{{ $listing->series->name }}</p>
        <strong>
            <p>IDR {{ $listing->individual_price }}</p>
        </strong>
        <p class="card-text">{{ $listing->description }}</p>
        <p class="card-text">{{ $listing->category->name }}</p>

        <form action="/cart/add" method="POST">
            @csrf
            <div class="d-flex flex-row">
                <input type="number" name="amount" class="form-control">
                <input type="submit" value="Add to Cart" class="form-control btn btn-primary w-50 mx-3">
            </div>
        </form>
    </div>

</div>

@endsection
