@extends('master')

@section('title', 'Search')

@section('style')
<style>
    main{
        padding: 5rem 5%;
    }

    input, select{
        max-width: 16rem;
    }
</style>
@endsection

@section('content')

<form action="/search">
    @csrf
    <div class="d-flex flex-row justify-content-around">
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
        <div class="mx-2">
            <label for="price" class="form-label">Price</label>
            <input type="range" class="form-range" id="price" name="price">
        </div>
        <input type="submit" value="Filter" class="btn btn-primary">
    </div>
</form>

@endsection
