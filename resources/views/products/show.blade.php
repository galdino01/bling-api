@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center rounded shadow mt-3 p-2">
        <div class="d-flex flex-row w-100">
            <div class="d-flex justify-content-center align-items-center w-25 me-3">
                @if ($product->image)
                    <img class="img-fluid w-100 h-100 rounded" src="{{ url("storage/{$product->image}") }}"
                        alt="Imagem do Produto" />
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
                    <span><strong>Name:</strong></span>&nbsp;
                    <p>{{ $product->name }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Origin:</strong></span>&nbsp;
                    <p>{{ $product->origin }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Price:</strong></span>&nbsp;
                    <p>{{ $product->price }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Brand:</strong></span>&nbsp;
                    <p>{{ $product->brand }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Price Cost:</strong></span>&nbsp;
                    <p>{{ $product->price_cost }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Warranty:</strong></span>&nbsp;
                    <p>{{ $product->warranty }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Width:</strong></span>&nbsp;
                    <p>{{ $product->width }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Height:</strong></span>&nbsp;
                    <p>{{ $product->height }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Deph:</strong></span>&nbsp;
                    <p>{{ $product->depth }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Net Weight:</strong></span>&nbsp;
                    <p>{{ $product->net_weight }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Gross Weight:</strong></span>&nbsp;
                    <p>{{ $product->gross_weight }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Quantity:</strong></span>&nbsp;
                    <p>{{ $product->quantity }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Localization:</strong></span>&nbsp;
                    <p>{{ $product->localization }}</p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row w-100 mt-3">
            <div class="row">
                <div class="col-md-12">
                    <span><strong>Description</strong></span>
                    <p>{{ $product->description }}</p>
                </div>
                <div class="col-md-12">
                    <span><strong>Notes</strong></span>
                    <p>{{ $product->notes }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
