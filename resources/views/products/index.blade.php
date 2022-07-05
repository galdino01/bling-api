@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-between">
        <div class="row mt-3">
            @foreach ($products as $product)
                <div class="p-1 col-md-4">
                    <div class="card">
                        @if ($product['produto']['imageThumbnail'] != null)
                            <img src="{{ $product['produto']['imageThumbnail'] }}" class="card-img-top" alt="Product Image">
                        @else
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-image"></i>&nbsp;
                                <span>No Image</span>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
