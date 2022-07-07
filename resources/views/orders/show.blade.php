@extends('layouts.app')

@section('content')
    <div class="mt-3 p-2 d-flex flex-column justify-content-center align-items-center rounded shadow">
        <div class="d-flex flex-row justify-content-start">
            <div class="row w-75">
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>ID:</strong></span>&nbsp;
                    <p>{{ $order->id }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Situação:</strong></span>&nbsp;
                    <p>{{ $order->situacao }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Total da Venda:</strong></span>&nbsp;
                    <p>{{ $order->totalVenda }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Data:</strong></span>&nbsp;
                    <p>{{ $order->data }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Data de Saída:</strong></span>&nbsp;
                    <p>{{ $order->dataSaida }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Cliente:</strong></span>&nbsp;
                    <p>{{ $order->customer->nome }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Número:</strong></span>&nbsp;
                    <p>{{ $order->numero }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Número Ordem Compra:</strong></span>&nbsp;
                    <p>{{ $order->numeroOrdemCompra ?? 'Sem número' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
