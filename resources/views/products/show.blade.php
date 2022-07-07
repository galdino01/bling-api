@extends('layouts.app')

@section('content')
    <div class="mt-3 p-2 d-flex flex-column justify-content-center align-items-center rounded shadow">
        <div class="d-flex flex-row justify-content-start">
            <div style="height: 300px;" class="roudend border w-25 me-3 d-flex justify-content-center align-items-center">
                @if ($product->imageThumbnail != null)
                    <img src="{{ $product->imageThumbnail }}" class="card-img-top" alt="Product Image">
                @else
                    <div class="d-flex justify-content-center align-items-center p-3">
                        <i class="fa-solid fa-image"></i>&nbsp;
                        <span>Sem Imagem</span>
                    </div>
                @endif
            </div>
            <div class="row w-75">
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>ID:</strong></span>&nbsp;
                    <p>{{ $product->id }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Código:</strong></span>&nbsp;
                    <p>{{ $product->codigo ?? 'Sem Código' }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Tipo:</strong></span>&nbsp;
                    <p>{{ $product->tipo }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Situação:</strong></span>&nbsp;
                    <p>{{ $product->situacao }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Categoria:</strong></span>&nbsp;
                    <p>{{ $product->category->descricao }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Fabricante:</strong></span>&nbsp;
                    <p>{{ $product->idFabricante ?? '_' }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Código Fabricante:</strong></span>&nbsp;
                    <p>{{ $product->codigoFabricante ?? '_' }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Class. Fiscal:</strong></span>&nbsp;
                    <p>{{ $product->class_fiscal }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Unidade:</strong></span>&nbsp;
                    <p>{{ $product->unidade }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Data de Inclusão:</strong></span>&nbsp;
                    <p>{{ \Carbon\Carbon::parse($product->dataInclusao)->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Data de Alteração:</strong></span>&nbsp;
                    <p>{{ \Carbon\Carbon::parse($product->dataAlteracao)->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4 d-flex flex-row">
                    <span><strong>Preço:</strong></span>&nbsp;
                    <p> R$ {{ number_format($product->preco, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-start w-100 mt-3">
            <div class="row">
                <div class="col-md-12">
                    <span><strong>Descrição</strong></span>
                    <p>{{ $product->descricao }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
