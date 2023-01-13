@extends('master')

@section('title', 'Your Cart')

@section('style')
<style>
    main{
        padding: 5rem 5%;
    }

    .card{
        padding: 0.5rem 0;
        height: 12rem;
    }

    .listing-img{
        height: 100%;
    }

    .list-btns{
        margin-left: auto;
        display: flex;
        flex-direction: column;
    }

    .trash{
        display: inline-block;
        margin-left: auto;
    }

    .update-stock{
        display: flex;
        margin-top: auto;
    }

    .card-block{
        flex-direction: column;
    }

</style>
@endsection

@section('content')

@include('components.page-header')

<div class="d-flex flex-row justify-content-between">
    <div class="mx-5 w-75">
        @foreach ($cart as $item)
            <div class="card flex-row mb-3">
                <div class="px-2">
                    <img src="{{ asset('storage/'.$item->listing->image) }}" class="listing-img">
                </div>
                <div class="card-block d-flex justify-content-between">
                    <div>
                        <h4>{{ $item->listing->name }}</h4>
                        <p class="card-text">{{ $item->listing->series->name }}</p>
                    </div>
                    <div>
                        <p class="card-text price">Rp. {{ $item->listing->individual_price }}</p>
                    </div>
                </div>

                <div class="list-btns px-2">
                    <div class="trash">
                        <form action="/listing/delete/" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger trash-btn" style="padding: 0.25rem 0.5rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <div class="update-stock">
                        <form action="/cart/stock/{{ $item->id }}" method="POST" class="d-flex">
                            @csrf
                            <input type="number" class="form-control mx-2" value="{{ $item->quantity }}" name="quantity">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </form>
                    </div>

                </div>
            </div>
            @endforeach
    </div>

    @php
        $total = 0;
    @endphp

    <div class="w-25">
        <div class="card">
            <h5 class="card-title mx-3">Summary</h5>
            <ul class="list-group list-group-flush">
                @foreach ($cart as $item)
                <li class="list-group-item">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            {{ "$item->quantity".'x '.$item->listing->name}}
                        </div>
                        <div>
                            {{ $item->listing->individual_price * $item->quantity }}
                        </div>
                    </div>
                </li>

                @php
                    $total += $item->listing->individual_price * $item->quantity;
                @endphp

                @endforeach
            </ul>
            <div class="px-3 my-auto">
                <div class="d-flex flex-row justify-content-between my-auto">
                    <div class="align-self-center">
                        <h4>IDR {{ $total }}</h4>
                    </div>

                    <div class="align-self-center">
                        <form action="/purchase" method="POST">
                            @csrf
                            <input type="submit" value="Purchase" class="btn btn-outline-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection
