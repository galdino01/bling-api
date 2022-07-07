@extends('layouts.app')

@section('content')
    <div class="mt-3 p-2 d-flex flex-row justify-content-center align-items-center rounded shadow">
        <div class="roudend border w-25 me-3">
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
            <div class="col-md-3 d-flex flex-row">
                <span><strong>ID:</strong></span>&nbsp;
                <p>{{ $product->id }}</p>
            </div>
            <div class="col-md-3 d-flex flex-row">
                <span><strong>Código:</strong></span>&nbsp;
                <p>{{ $product->codigo ?? 'Sem Código' }}</p>
            </div>
            <div class="col-md-3 d-flex flex-row">
                <span><strong>Tipo:</strong></span>&nbsp;
                <p>{{ $product->tipo }}</p>
            </div>
            <div class="col-md-3 d-flex flex-row">
                <span><strong>Situação:</strong></span>&nbsp;
                <p>{{ $product->situacao }}</p>
            </div>
            <div class="col-md-3 d-flex flex-row">
                <span><strong>Categoria:</strong></span>&nbsp;
                <p>{{ $product->category->descricao }}</p>
            </div>
            <div class="col-md-3 d-flex flex-row">
                <span><strong>Fabricante:</strong></span>&nbsp;
                <p>{{ $product->idFabricante ?? '_' }}</p>
            </div>
            <div class="col-md-3 d-flex flex-row">
                <span><strong>Código Fabricante:</strong></span>&nbsp;
                <p>{{ $product->codigoFabricante ?? '_' }}</p>
            </div>
            <div class="col-md-3 d-flex flex-row">
                <span><strong>Class. Fiscal:</strong></span>&nbsp;
                <p>{{ $product->class_fiscal }}</p>
            </div>
        </div>
    </div>
@endsection
