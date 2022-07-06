@extends('layouts.app')

@section('content')
    <div class="mt-3 mb-3 d-flex flex-column justify-content-center align-items-center">
        <div>
            <h3 class="text-center">Produtos no Banco de Dados</h3>
        </div>
        @if($products->count() != 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Chave</th>
                        <th scope="col">Código</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data Inclusão</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th>{{ $product->id }}</th>
                            <td>{{ $product->key ?? 'Sem Chave' }}</td>
                            <td>{{ $product->codigo ?? 'Sem Código' }}</td>
                            <td>{{ $product->descricao ?? 'Sem Descrição' }}</td>
                            <td>{{ \Carbon\Carbon::parse($product->dataInclusao)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
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
                            <h5 class="card-title">
                                @if ($api_product['codigo'] == null || $api_product['codigo'] == '')
                                    Sem Código
                                @else
                                    {{ $api_product['codigo'] }}
                                @endif
                            </h5>
                            <p class="card-text">
                                @if ($api_product['descricao'] == null || $api_product['descricao'] == '')
                                    Sem Descrição
                                @else
                                    {{ $api_product['descricao'] }}
                                @endif
                            </p>
                            <p class="card-text">{{ $api_product['categoria']['id'] }}</p>
                            <p class="card-text">{{ $api_product['categoria']['descricao'] }}</p>

                            @include('products.form')

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
