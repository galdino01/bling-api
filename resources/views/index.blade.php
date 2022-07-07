@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-3 d-flex flex-column justify-content-center align-items-center">
            <a href="{{ route('products.index') }}" class="btn btn-primary w-25 mb-3">
                Produtos
            </a>
            <a href="#" class="btn btn-primary w-25 mb-3">
                Pedidos
            </a>
            <a href="#" class="btn btn-primary w-25">
                Notas Fiscais
            </a>
        </div>
    </div>
@endsection
