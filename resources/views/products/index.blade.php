@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex flex-row align-items-center justify-content-between w-100 mt-5">
        <h4>Produtos</h4>
    </div>
    @if($products->count() != 0)
        <div class="rounded shadow p-2 bg-white">
            @livewire('product-table')
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            Nenhum registro encontrado.
        </div>
    @endif
@endsection
