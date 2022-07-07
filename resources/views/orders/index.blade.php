@extends('layouts.app')

@section('content')
    <div class="mt-3 mb-5 d-flex flex-column justify-content-center align-items-center rounded shadow p-2">
        <div class="d-flex flex-row align-items-center justify-content-between w-100 mb-5">
            <div class="w-50">
                <h3>Pedidos no Banco de Dados</h3>
            </div>
            @if ($orders->count() > 0)
                <form class="w-50" action="{{ route('products.index') }}" method="GET">
                    <div class="input-group w-100">
                        <input type="text" name="search" class="form-control" placeholder="Chave" aria-label="Use o Código ou a Chave aqui" aria-describedby="btn-search">
                        <button class="btn btn-outline-primary" type="submit" id="btn-search">Pesquisar</button>
                    </div>
                </form>
            @endif
        </div>
        @if($orders->count() != 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Código</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data Inclusão</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th>{{ $order->id }}</th>
                            <td>{{ $order->totalvenda }}</td>
                            <td>{{ $order->data  }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->dataSaida)->format('d/m/Y') }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{route('orders.show', ['id' => $order->id])}}">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-2">
                {{ $orders->links() }}
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                Nenhum registro encontrado.
            </div>
        @endif
    </div>
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="mt-3 d-flex flex-column justify-content-center align-items-center">
        <div>
            <h3 class="text-center">Pedidos da API</h3>
        </div>
        <div class="row">
            @foreach ($api_orders as $api_order)
                <div class="p-1 col-md-4">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-md-3">
                                <span><strong>ID:</strong></span>&nbsp;
                                <p class="card-text">{{ $api_order['id'] }}</p>
                            </div>
                            <div class="col-md-3">
                                <span><strong>Total da Venda:</strong></span>&nbsp;
                                <p class="card-text">{{ $api_order['totalVenda'] }}</p>
                            </div>
                            <div class="col-md-3">
                                <span><strong>Data:</strong></span>&nbsp;
                                <p class="card-text">{{ $api_order['data'] }}</p>
                            </div>
                            <div class="col-md-3">
                                <span><strong>Data de Saída:</strong></span>&nbsp;
                                <p class="card-text">{{ $api_order['dataSaida'] }}</p>
                            </div>
                            <div class="col-md-3">
                                <span><strong>Cliente:</strong></span>&nbsp;
                                <p class="card-text">{{ $api_order['cliente']['nome'] }}</p>
                            </div>

                            @include('orders.form')

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection