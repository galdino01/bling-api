@extends('layouts.app')

@section('content')
    <div class="mt-3 mb-5 d-flex flex-column justify-content-center align-items-center rounded shadow p-2">
        <div class="d-flex flex-row align-items-center justify-content-between w-100 mb-5">
            <div class="w-50">
                <h3>Produtos no Banco de Dados</h3>
            </div>
            @if ($products->count() > 0)
                <form class="w-50" action="{{ route('products.index') }}" method="GET">
                    <div class="input-group w-100">
                        <input type="text" name="search" class="form-control" placeholder="ID Pedido" aria-label="Use o ID aqui" aria-describedby="btn-search">
                        <button class="btn btn-outline-primary" type="submit" id="btn-search">Pesquisar</button>
                    </div>
                </form>
            @endif
        </div>
        @if($products->count() != 0)
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
                            <td>{{ $product->codigo ?? 'Sem Código' }}</td>
                            <td>{{ $product->descricao ?? 'Sem Descrição' }}</td>
                            <td>{{ \Carbon\Carbon::parse($product->dataInclusao)->format('d/m/Y') }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{route('products.show', ['id' => $product->id])}}">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-2">
                {{ $products->links() }}
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
            <h3 class="text-center">Produtos da API</h3>
        </div>
        <div class="row">
            @foreach ($api_products as $api_product)
                <div class="p-1 col-md-4">
                    <div class="card">
                        @if ($api_product['imageThumbnail'] != null)
                            <img src="{{ $api_product['imageThumbnail'] }}" class="card-img-top" alt="Product Image">
                        @else
                            <div class="d-flex justify-content-center align-items-center p-3">
                                <i class="fa-solid fa-image"></i>&nbsp;
                                <span>Sem Imagem</span>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="w-100 d-flex align-items-center justify-content-start">
                                <div class="d-flex flex-row align-items-center mb-3">
                                    @if ($api_product['codigo'] == null || $api_product['codigo'] == '')
                                        <span><strong>Código:</strong></span>&nbsp;
                                        <p class="card-text">Sem Código</p>
                                    @else
                                        <span><strong>Código:</strong></span>&nbsp;
                                        <p class="card-text">{{ $api_product['codigo'] }}</p>
                                    @endif
                                </div>
                            </div>
                            @if ($api_product['id'] == null || $api_product['id'] == '')
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <span><strong>ID:</strong></span>&nbsp;
                                    <p class="card-text">Sem ID</p>
                                </div>
                            @else
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <span><strong>ID:</strong></span>&nbsp;
                                    <p class="card-text">{{ $api_product['id'] }}</p>
                                </div>
                            @endif
                            @if ($api_product['descricao'] == null || $api_product['descricao'] == '')
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <span><strong>Descrição:</strong></span>&nbsp;
                                    <p class="card-text">Sem Descrição</p>
                                </div>
                            @else
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <span><strong>Descrição:</strong></span>&nbsp;
                                    <p class="card-text">{{ $api_product['descricao'] }}</p>
                                </div>
                            @endif
                            <div class="d-flex flex-row align-items-center mb-3">
                                <span><strong>Categoria:</strong></span>&nbsp;
                                <p class="card-text">{{ $api_product['categoria']['descricao'] }}</p>
                            </div>

                            @include('products.form')

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
