@extends('master')

@section('title', 'Search')

@section('style')
<style>
    main{
        padding: 5rem 5%;
    }
    .links nav{
        background: none;
    }
</style>
@endsection

@section('content')

<div class="d-flex flex-row">
    <div class="d-flex">
        <form action="/search" class="d-flex flex-column">
            @csrf
            <div class="card" style="width: 16rem">
                <h5 class="card-header">Narrow by price</h5>
                <div class="card-body">
                    <label for="minprice" class="form-label">Min Price</label>
                    <input type="number" class="form-control" id="minprice" name="minprice" placeholder="Ex: 20000" value={{ $minPriceQuery != null ? $minPriceQuery : "" }}>
                    <label for="maxprice" class="form-label">Max Price</label>
                    <input type="number" class="form-control" id="maxprice" name="maxprice" placeholder="Ex: 2000000" value={{ $maxPriceQuery != null ? $maxPriceQuery : "" }}>
                </div>
            </div>
            <div class="card my-5" style="width: 16rem">
                <h5 class="card-header">Narrow by preferences</h5>
                <div class="card-body d-flex flex-column justify-content-around align-items-center">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Listing name" class="mx-2">
                    <select class="form-select" name="category" id="category" class="mx-2">
                        <option selected value="">Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $categoryQuery == $category->id ? 'selected' : "" }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <select class="form-select" name="series" id="series" class="mx-2">
                        <option selected value="">Series</option>
                        @foreach ($series_array as $series)
                        <option value="{{ $series->id }}" {{ $seriesQuery == $series->id ? 'selected' : "" }}>{{ $series->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="submit" value="Filter" class="btn btn-primary h-10">

            <div class="d-flex justify-content-center my-auto links py-5">
                {{{ $listings->links() }}}
            </div>

        </form>
    </div>
    <div class="mx-3">
        <div class="row">
            @foreach ($listings as $listing)
                <div class="col col-lg-3 col-md-4 col-sm-6 mx-auto mb-2">
                    @include('components.listing-card')
                </div>
            @endforeach
        </div>
    </div>
</div>



@endsection
