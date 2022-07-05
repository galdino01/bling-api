@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            @foreach ($products as $product)
                <div class="p-1 col-md-4">
                    <div class="card">
                        @if ($product['produto']['imageThumbnail'] != null)
                            <img src="{{ $product['produto']['imageThumbnail'] }}" class="card-img-top" alt="Product Image">
                        @else
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-image"></i>&nbsp;
                                <span>No Image</span>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                @if ($product['produto']['codigo'] == null || $product['produto']['codigo'] == '')
                                    Sem Código
                                @else
                                    {{ $product['produto']['codigo'] }}
                                @endif
                            </h5>
                            <p class="card-text">
                                @if ($product['produto']['descricao'] == null || $product['produto']['descricao'] == '')
                                    Sem Descrição
                                @else
                                    {{ $product['produto']['descricao'] }}
                                @endif
                            </p>
                            <form id="{{ $product['produto']['id'] }}" action="{{ route('products.store') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product['produto']['id'] }}">

                                <input type="hidden" name="idFabricante"
                                    value="{{ $product['produto']['idFabricante'] }}">
                                <input type="hidden" name="idGrupoProduto"
                                    value="{{ $product['produto']['idGrupoProduto'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['categoria']['id'] }}">

                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['codigo'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['descricao'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['tipo'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['situacao'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['unidade'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['preco'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['precoCusto'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['descricaoCurta'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['descricaoComplementar'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['dataInclusao'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['dataAlteracao'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['imageThumbnail'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['urlVideo'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['nomeFornecedor'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['codigoFabricante'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['marca'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['class_fiscal'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['cest'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['origem'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['linkExterno'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['observacoes'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['grupoProduto'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['garantia'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['descricaoFornecedor'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['pesoLiq'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['pesoBruto'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['estoqueMinimo'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['estoqueMaximo'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['gtin'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['gtinEmbalagem'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['larguraProduto'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['alturaProduto'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['profundidadeProduto'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['unidadeMedida'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['itensPorCaixa'] }}">
                                <input type="hidden" name="idCategoria" value="{{ $product['produto']['volumes'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['localizacao'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['crossdocking'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['condicao'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['freteGratis'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['producao'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['dataValidade'] }}">
                                <input type="hidden" name="idCategoria"
                                    value="{{ $product['produto']['spedTipoItem'] }}">

                                <input type="submit" class="font-weight-bold btn btn-primary" value="Salvar no Banco">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
