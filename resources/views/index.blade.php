@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-row justify-content-center align-items-center mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-primary w-25 mb-3">
                Produtos
            </a>
            <a href="{{ route('orders.index') }}" class="btn btn-primary w-25 mb-3">
                Pedidos
            </a>
            <a href="#" class="btn btn-primary w-25">
                Notas Fiscais
            </a>
        </div>
    </div>
@endsection
