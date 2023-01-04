@extends('master')

@section('title', 'Home')

@section('style')
<style>

    main{
        padding: 5rem 5%;
    }

    .series-card{
        width: 16rem;
    }

    .series-img{
        width: 100%;
        height: 6rem;
    }
</style>
@endsection

@section('content')

<div class="row row-cols-4">
    @foreach ($series_array as $series)
    <div class="col mx-auto">
        <div class="card series-card mx-auto mb-3">
            <a href="" class="btn">
                <img src="{{asset("storage/$series->image")}}" class="series-img">
            </a>
        </div>
    </div>
    @endforeach
</div>

@endsection
