@extends('master')

@section('title', 'Search')

@section('style')
<style>
    main{
        padding: 5rem 5%;
    }

    input, select{
        max-width: 12rem;
    }
</style>
@endsection

@section('content')

<form action="/search" class="d-flex flex-column">
    @csrf
    <div class="card" style="width: 16rem">
        <h5 class="card-header">Narrow by price</h5>
        <div class="card-body">
            <label for="minprice" class="form-label">Min Price</label>
            <input type="number" class="form-control" id="minprice" name="minprice" placeholder="Ex: 20000">
            <label for="maxprice" class="form-label">Max Price</label>
            <input type="number" class="form-control" id="maxprice" name="maxprice" placeholder="Ex: 2000000">
        </div>
    </div>
    <div class="card my-5" style="width: 16rem">
        <h5 class="card-header">Narrow by preferences</h5>
        <div class="card-body d-flex flex-column justify-content-around align-items-center">
            <input type="text" class="form-control" id="name" name="name" placeholder="Listing name" class="mx-2">
            <select class="form-select" name="category" id="category" class="mx-2">
                <option selected>Category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <select class="form-select" name="series" id="series" class="mx-2">
                <option selected>Series</option>
                @foreach ($series_array as $series)
                <option value="{{ $series->id }}">{{ $series->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <input type="submit" value="Filter" class="btn btn-primary h-50 mx-2">
</form>

@endsection
