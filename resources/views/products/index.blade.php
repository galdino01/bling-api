@extends('layouts.app')

@section('content')
    <div class="mt-3">
        @if ($products)
            <h3>isso</h3>
        @else
            <h3>aquilo</h3>
        @endif
    </div>
    <div class="row mt-3">
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
                        <form id="{{ $api_product['produto']['id'] }}" action="{{ route('products.store') }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $api_product['produto']['id'] }}">

                            <input type="hidden" name="idFabricante"
                                value="{{ $api_product['produto']['idFabricante'] }}">
                            <input type="hidden" name="idGrupoProduto"
                                value="{{ $api_product['produto']['idGrupoProduto'] }}">
                            <input type="hidden" name="idCategoria"
                                value="{{ $api_product['produto']['categoria']['id'] }}">

                            <input type="hidden" name="codigo" value="{{ $api_product['produto']['codigo'] }}">
                            <input type="hidden" name="descricao" value="{{ $api_product['produto']['descricao'] }}">
                            <input type="hidden" name="tipo" value="{{ $api_product['produto']['tipo'] }}">
                            <input type="hidden" name="situacao" value="{{ $api_product['produto']['situacao'] }}">
                            <input type="hidden" name="unidade" value="{{ $api_product['produto']['unidade'] }}">
                            <input type="hidden" name="preco" value="{{ $api_product['produto']['preco'] }}">
                            <input type="hidden" name="precoCusto" value="{{ $api_product['produto']['precoCusto'] }}">
                            <input type="hidden" name="descricaoCurta"
                                value="{{ $api_product['produto']['descricaoCurta'] }}">
                            <input type="hidden" name="descricaoComplementar"
                                value="{{ $api_product['produto']['descricaoComplementar'] }}">
                            <input type="hidden" name="dataInclusao"
                                value="{{ $api_product['produto']['dataInclusao'] }}">
                            <input type="hidden" name="dataAlteracao"
                                value="{{ $api_product['produto']['dataAlteracao'] }}">
                            <input type="hidden" name="imageThumbnail"
                                value="{{ $api_product['produto']['imageThumbnail'] }}">
                            <input type="hidden" name="urlVideo"
                                value="{{ $api_product['produto']['urlVideo'] ? $api_product['produto']['urlVideo'] : '' }}">
                            <input type="hidden" name="nomeFornecedor"
                                value="{{ $api_product['produto']['nomeFornecedor'] }}">
                            <input type="hidden" name="codigoFabricante"
                                value="{{ $api_product['produto']['codigoFabricante'] }}">
                            <input type="hidden" name="marca"
                                value="{{ $api_product['produto']['marca'] ? $api_product['produto']['marca'] : '' }}">
                            <input type="hidden" name="class_fiscal"
                                value="{{ $api_product['produto']['class_fiscal'] }}">
                            <input type="hidden" name="cest"
                                value="{{ $api_product['produto']['cest'] ? $api_product['produto']['cest'] : '' }}">
                            <input type="hidden" name="origem" value="{{ $api_product['produto']['origem'] }}">
                            <input type="hidden" name="linkExterno"
                                value="{{ $api_product['produto']['linkExterno'] ? $api_product['produto']['linkExterno'] : '' }}">
                            <input type="hidden" name="observacoes"
                                value="{{ $api_product['produto']['observacoes'] ? $api_product['produto']['observacoes'] : '' }}">
                            <input type="hidden" name="grupoProduto"
                                value="{{ $api_product['produto']['grupoProduto'] ? $api_product['produto']['grupoProduto'] : '' }}">
                            <input type="hidden" name="garantia" value="{{ $api_product['produto']['garantia'] }}">
                            <input type="hidden" name="descricaoFornecedor"
                                value="{{ $api_product['produto']['descricaoFornecedor'] }}">
                            <input type="hidden" name="pesoLiq" value="{{ $api_product['produto']['pesoLiq'] }}">
                            <input type="hidden" name="pesoBruto" value="{{ $api_product['produto']['pesoBruto'] }}">
                            <input type="hidden" name="estoqueMinimo"
                                value="{{ $api_product['produto']['estoqueMinimo'] }}">
                            <input type="hidden" name="estoqueMaximo"
                                value="{{ $api_product['produto']['estoqueMaximo'] }}">
                            <input type="hidden" name="gtin"
                                value="{{ $api_product['produto']['gtin'] ? $api_product['produto']['gtin'] : '' }}">
                            <input type="hidden" name="gtinEmbalagem"
                                value="{{ $api_product['produto']['gtinEmbalagem'] ? $api_product['produto']['gtinEmbalagem'] : '_' }}">
                            <input type="hidden" name="larguraProduto"
                                value="{{ $api_product['produto']['larguraProduto'] }}">
                            <input type="hidden" name="alturaProduto"
                                value="{{ $api_product['produto']['alturaProduto'] }}">
                            <input type="hidden" name="profundidadeProduto"
                                value="{{ $api_product['produto']['profundidadeProduto'] }}">
                            <input type="hidden" name="unidadeMedida"
                                value="{{ $api_product['produto']['unidadeMedida'] }}">
                            <input type="hidden" name="itensPorCaixa"
                                value="{{ $api_product['produto']['itensPorCaixa'] }}">
                            <input type="hidden" name="volumes" value="{{ $api_product['produto']['volumes'] }}">
                            <input type="hidden" name="localizacao"
                                value="{{ $api_product['produto']['localizacao'] ? $api_product['produto']['localizacao'] : '' }}">
                            <input type="hidden" name="crossdocking"
                                value="{{ $api_product['produto']['crossdocking'] }}">
                            <input type="hidden" name="condicao" value="{{ $api_product['produto']['condicao'] }}">
                            <input type="hidden" name="freteGratis"
                                value="{{ $api_product['produto']['freteGratis'] }}">
                            <input type="hidden" name="producao" value="{{ $api_product['produto']['producao'] }}">
                            <input type="hidden" name="dataValidade"
                                value="{{ $api_product['produto']['dataValidade'] }}">
                            <input type="hidden" name="spedTipoItem"
                                value="{{ $api_product['produto']['spedTipoItem'] }}">

                            <input type="submit" class="font-weight-bold btn btn-primary" value="Salvar no Banco">
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
