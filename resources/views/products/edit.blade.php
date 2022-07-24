@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center rounded shadow mt-3 p-2">
        <div class="d-flex flex-row justify-content-start">
            <div style="height: 300px;" class="d-flex justify-content-center align-items-center roudend border w-25 me-3">
                @if ($product->image != null)
                    <img src="{{ $product->image }}" class="card-img-top" alt="Product Image">
                @else
                    <div class="d-flex justify-content-center align-items-center p-3">
                        <i class="fa-solid fa-image"></i>&nbsp;
                        <span>No Image</span>
                    </div>
                @endif
            </div>
            <div class="row w-75">
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>ID:</strong></span>&nbsp;
                    <p>{{ $product->id }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Status:</strong></span>&nbsp;
                    <p>{{ $product->status }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Category:</strong></span>&nbsp;
                    <p>{{ $product->category->name }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Quantity:</strong></span>&nbsp;
                    <p>{{ $product->quantity }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Created At:</strong></span>&nbsp;
                    <p>{{ $product->created_at->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Updated At:</strong></span>&nbsp;
                    <p>{{ $product->updated_at->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Price:</strong></span>&nbsp;
                    <p> R$ {{ $product->price }}</p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-start w-100 mt-3">
            <div class="row">
                <div class="col-md-12">
                    <span><strong>Description</strong></span>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
