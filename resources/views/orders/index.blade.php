@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="fw-bold">
            Orders
        </h3>
        <a class="btn btn-outline-primary rounded-pill" href="{{ route('orders.create') }}" title="Create New Order">
            <i class="fa fa-plus me-2" aria-hidden="true"></i>
            Register Order
        </a>
    </div>
    <div class="rounded shadow p-2 bg-white">
        @livewire('order-table')
    </div>
@endsection
