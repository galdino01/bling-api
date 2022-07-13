@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex flex-column justify-content-center align-items-center rounded shadow p-2 mt-3 mb-5">
        <div class="d-flex flex-row align-items-center justify-content-between w-100 mb-5">
            <div class="w-50">
                <h3>Pedidos no Banco de Dados</h3>
            </div>
            @if ($orders->count() > 0)
                <form class="w-50" action="{{ route('orders.index') }}" method="GET">
                    <div class="input-group w-100">
                        <input type="text" name="search" class="form-control" placeholder="ID Pedido" aria-label="Use o ID aqui" aria-describedby="btn-search">
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
                        <th scope="col">Total da Venda</th>
                        <th scope="col">Data</th>
                        <th scope="col">Data de Saída</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th>{{ $order->id }}</th>
                            <td>R$ {{ number_format($order->total_sale, 2, ',', '.') }}</td>
                            <td>{{ $order->created_at->format('d/m/Y')  }}</td>
                            <td>{{ $order->output_date>format('d/m/Y') }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{route('orders.show', ['id' => $order->id])}}">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning" role="alert">
                Nenhum registro encontrado.
            </div>
        @endif
    </div>
@endsection
