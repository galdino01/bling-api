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
                    <span><strong>Total da Venda:</strong></span>&nbsp;
                    <p>{{ $order->total_sale }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Data:</strong></span>&nbsp;
                    <p>{{ $order->created_at->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Data de Saída:</strong></span>&nbsp;
                    <p>{{ $order->output_date->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Cliente:</strong></span>&nbsp;
                    <p>{{ $order->user->name }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Número:</strong></span>&nbsp;
                    <p>{{ $order->number }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
