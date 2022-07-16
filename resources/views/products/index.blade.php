@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row align-items-center justify-content-between w-100 mt-5 mb-3">
        <h4>Produtos</h4>
        <button class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalProducts" type="button" title="Cadastrar novo produto">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>
    @include('products.modal')
    <div class="rounded shadow p-2 bg-white mb-5">
        @livewire('product-table')
    </div>
@endsection
