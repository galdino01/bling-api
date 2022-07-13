@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex flex-row align-items-center justify-content-between w-100 mt-5">
        <div class="w-50">
            <h4>Produtos</h4>
        </div>
        @if ($products->count() > 0)
            <form class="w-50" action="{{ route('products.index') }}" method="GET">
                <div class="input-group w-100">
                    <input type="text" name="search" class="form-control" placeholder="ID Produto" aria-label="Use o ID aqui" aria-describedby="btn-search">
                    <button class="btn btn-outline-primary" type="submit" id="btn-search">Pesquisar</button>
                </div>
            </form>
        @endif
    </div>
    @if(!$products->count() != 0)
        <div class="d-flex flex-column justify-content-center align-items-center rounded shadow p-2 mb-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            <input type="text" class="form-controll filter-input" placeholder="Search by ID..." data-column="0" />
                        </th>
                        <th>
                            <input type="text" class="form-controll filter-input" placeholder="Search by name..." data-column="1" />
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center rounded shadow p-2">
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
                    @foreach ($products as $product)
                        <tr>
                            <th>{{ $product->id }}</th>
                            <td>{{ $product->code ?? 'Sem Código' }}</td>
                            <td>{{ $product->description ?? 'Sem Descrição' }}</td>
                            <td>{{ $product->inclusion_date->format('d/m/Y') }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{route('products.show', ['id' => $product->id])}}">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            Nenhum registro encontrado.
        </div>
    @endif
@endsection
