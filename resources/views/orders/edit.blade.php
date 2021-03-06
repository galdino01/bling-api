@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center rounded shadow mt-3 p-2">
        <div class="d-flex flex-row justify-content-start">
            <div class="row w-100">
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>ID:</strong></span>&nbsp;
                    <p>{{ $order->id }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Status:</strong></span>&nbsp;
                    <p>{{ $order->status }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Total Sale:</strong></span>&nbsp;
                    <p>{{ $order->total_sale }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Created At:</strong></span>&nbsp;
                    <p>{{ $order->created_at }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Output Date:</strong></span>&nbsp;
                    <p>{{ $order->output_date }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Customer:</strong></span>&nbsp;
                    <p>{{ $order->user->name }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
