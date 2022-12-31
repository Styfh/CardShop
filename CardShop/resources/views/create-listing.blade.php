@extends('master')

@section('title', 'Create Listing')

@section('style')
<style>
    main{
        padding: 10vh 25vw;
    }

    .card{
        padding: 2rem;
    }
</style>
@endsection

@section('content')
@include('components.page-header')
<div class="card">
    <form action="">
        <div class="mb-3">
            <label for="name" class="form-label">Listing name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Individual price</label>
            <input type="number" class="form-control" name="price" id="price">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Initial stock</label>
            <input type="number" class="form-control" name="stock" id="stock">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category" id="category">
                <option selected>Select category</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <select class="form-select" name="series" id="series">
                <option selected>Select category</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <input type="submit" class="form-control btn btn-primary mb-4" value="Create">
    </form>
</div>
@endsection
