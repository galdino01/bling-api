@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="fw-bold">
            Products
        </h3>
        <a class="btn btn-outline-primary rounded-pill" href="{{ route('products.create') }}" title="Create New Product">
            <i class="fa fa-plus me-2" aria-hidden="true"></i>
            Register Product
        </a>
    </div>
    <div class="rounded shadow p-2 bg-white mt-3 mb-3">
        @livewire('product-table')
    </div>
@endsection
