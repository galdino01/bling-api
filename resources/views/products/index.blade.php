@extends('layouts.app')

@section('content')
    <a class="btn btn-outline-primary rounded-pill" href="{{ route('products.create') }}"  title="Cadastrar novo produto">
        <i class="fa fa-plus me-2" aria-hidden="true"></i>
        Cadastrar Produto
    </a>
    <div class="rounded shadow p-2 bg-white mt-3 mb-3">
        @livewire('product-table')
    </div>
@endsection
