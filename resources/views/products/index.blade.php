@extends('layouts.app')

@section('content')
    <div class="mt-5 mb-3">
        <a class="btn btn-outline-primary rounded-pill" href="{{ route('products.create') }}"  title="Cadastrar novo produto">
            <i class="fa fa-plus me-2" aria-hidden="true"></i>
            Cadastrar Produto
        </a>
    </div>
    <div class="rounded shadow p-2 bg-white mb-5">
        @livewire('product-table')
    </div>
@endsection
