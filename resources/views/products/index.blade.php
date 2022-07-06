@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex flex-column justify-content-center align-items-center">
        <div>
            <h3 class="text-center">Produtos no Banco de Dados</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Código</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data Inclusão</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th>{{ $product->id }}</th>
                        <td>{{ $product->codigo ?? 'Sem Código' }}</td>
                        <td>{{ $product->descricao ?? 'Sem Descrição' }}</td>
                        <td>{{ \Carbon\Carbon::parse($product->dataInclusao)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    <div class="mt-3 d-flex flex-column justify-content-center align-items-center">
        <div>
            <h3 class="text-center">Produtos da API</h3>
        </div>
        <div class="row">
            @foreach ($api_products as $api_product)
                <div class="p-1 col-md-4">
                    <div class="card">
                        @if ($api_product['produto']['imageThumbnail'] != null)
                            <img src="{{ $api_product['produto']['imageThumbnail'] }}" class="card-img-top" alt="Product Image">
                        @else
                            <div class="d-flex justify-content-center align-items-center p-3">
                                <i class="fa-solid fa-image"></i>&nbsp;
                                <span>Sem Imagem</span>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                @if ($api_product['produto']['codigo'] == null || $api_product['produto']['codigo'] == '')
                                    Sem Código
                                @else
                                    {{ $api_product['produto']['codigo'] }}
                                @endif
                            </h5>
                            <p class="card-text">
                                @if ($api_product['produto']['descricao'] == null || $api_product['produto']['descricao'] == '')
                                    Sem Descrição
                                @else
                                    {{ $api_product['produto']['descricao'] }}
                                @endif
                            </p>
                            <p class="card-text">{{ $api_product['produto']['categoria']['id'] }}</p>
                            <p class="card-text">{{ $api_product['produto']['categoria']['descricao'] }}</p>
                            <form id="{{ $api_product['produto']['id'] }}" action="{{ route('products.store') }}" method="POST">
                                @csrf
                                <input hidden type="text" name="key" value="{{ $api_product['produto']['id'] }}">
                                <input hidden type="text" name="idFabricante" value="{{ $api_product['produto']['idFabricante'] }}">
                                <input hidden type="text" name="idGrupoProduto" value="{{ $api_product['produto']['idGrupoProduto'] }}">
                                <input hidden type="text" name="idCategoria" value="{{ $api_product['produto']['categoria']['id'] }}">
                                <input hidden type="text" name="codigo" value="{{ $api_product['produto']['codigo'] }}">
                                <input hidden type="text" name="descricao" value="{{ $api_product['produto']['descricao'] }}">
                                <input hidden type="text" name="tipo" value="{{ $api_product['produto']['tipo'] }}">
                                <input hidden type="text" name="situacao" value="{{ $api_product['produto']['situacao'] }}">
                                <input hidden type="text" name="unidade" value="{{ $api_product['produto']['unidade'] }}">
                                <input hidden type="text" name="preco" value="{{ $api_product['produto']['preco'] }}">
                                <input hidden type="text" name="precoCusto" value="{{ $api_product['produto']['precoCusto'] }}">
                                <input hidden type="text" name="descricaoCurta" value="{{ $api_product['produto']['descricaoCurta'] }}">
                                <input hidden type="text" name="descricaoComplementar" value="{{ $api_product['produto']['descricaoComplementar'] }}">
                                <input hidden type="text" name="dataInclusao" value="{{ $api_product['produto']['dataInclusao'] }}">
                                <input hidden type="text" name="dataAlteracao" value="{{ $api_product['produto']['dataAlteracao'] }}">
                                <input hidden type="text" name="imageThumbnail" value="{{ $api_product['produto']['imageThumbnail'] }}">
                                <input hidden type="text" name="urlVideo" value="{{ $api_product['produto']['urlVideo'] ? $api_product['produto']['urlVideo'] : '' }}">
                                <input hidden type="text" name="nomeFornecedor" value="{{ $api_product['produto']['nomeFornecedor'] }}">
                                <input hidden type="text" name="codigoFabricante" value="{{ $api_product['produto']['codigoFabricante'] }}">
                                <input hidden type="text" name="marca" value="{{ $api_product['produto']['marca'] ? $api_product['produto']['marca'] : '' }}">
                                <input hidden type="text" name="class_fiscal" value="{{ $api_product['produto']['class_fiscal'] }}">
                                <input hidden type="text" name="cest" value="{{ $api_product['produto']['cest'] ? $api_product['produto']['cest'] : '' }}">
                                <input hidden type="text" name="origem" value="{{ $api_product['produto']['origem'] }}">
                                <input hidden type="text" name="linkExterno" value="{{ $api_product['produto']['linkExterno'] ? $api_product['produto']['linkExterno'] : '' }}">
                                <input hidden type="text" name="observacoes" value="{{ $api_product['produto']['observacoes'] ? $api_product['produto']['observacoes'] : '' }}">
                                <input hidden type="text" name="grupoProduto" value="{{ $api_product['produto']['grupoProduto'] ? $api_product['produto']['grupoProduto'] : '' }}">
                                <input hidden type="text" name="garantia" value="{{ $api_product['produto']['garantia'] }}">
                                <input hidden type="text" name="descricaoFornecedor" value="{{ $api_product['produto']['descricaoFornecedor'] }}">
                                <input hidden type="text" name="pesoLiq" value="{{ $api_product['produto']['pesoLiq'] }}">
                                <input hidden type="text" name="pesoBruto" value="{{ $api_product['produto']['pesoBruto'] }}">
                                <input hidden type="text" name="estoqueMinimo" value="{{ $api_product['produto']['estoqueMinimo'] }}">
                                <input hidden type="text" name="estoqueMaximo" value="{{ $api_product['produto']['estoqueMaximo'] }}">
                                <input hidden type="text" name="gtin" value="{{ $api_product['produto']['gtin'] ? $api_product['produto']['gtin'] : '' }}">
                                <input hidden type="text" name="gtinEmbalagem" value="{{ $api_product['produto']['gtinEmbalagem'] ? $api_product['produto']['gtinEmbalagem'] : '_' }}">
                                <input hidden type="text" name="larguraProduto" value="{{ $api_product['produto']['larguraProduto'] }}">
                                <input hidden type="text" name="alturaProduto" value="{{ $api_product['produto']['alturaProduto'] }}">
                                <input hidden type="text" name="profundidadeProduto" value="{{ $api_product['produto']['profundidadeProduto'] }}">
                                <input hidden type="text" name="unidadeMedida" value="{{ $api_product['produto']['unidadeMedida'] }}">
                                <input hidden type="text" name="itensPorCaixa" value="{{ $api_product['produto']['itensPorCaixa'] }}">
                                <input hidden type="text" name="volumes" value="{{ $api_product['produto']['volumes'] }}">
                                <input hidden type="text" name="localizacao" value="{{ $api_product['produto']['localizacao'] ? $api_product['produto']['localizacao'] : '' }}">
                                <input hidden type="text" name="crossdocking" value="{{ $api_product['produto']['crossdocking'] }}">
                                <input hidden type="text" name="condicao" value="{{ $api_product['produto']['condicao'] }}">
                                <input hidden type="text" name="freteGratis" value="{{ $api_product['produto']['freteGratis'] }}">
                                <input hidden type="text" name="producao" value="{{ $api_product['produto']['producao'] }}">
                                <input hidden type="text" name="dataValidade" value="{{ $api_product['produto']['dataValidade'] }}">
                                <input hidden type="text" name="spedTipoItem" value="{{ $api_product['produto']['spedTipoItem'] }}">

                                <input type="submit" class="font-weight-bold btn btn-primary" value="Salvar no Banco">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
