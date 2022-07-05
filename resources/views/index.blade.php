@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-3 d-flex flex-column justify-content-center align-items-center">
            <a href="{{ route('products.index') }}" class="btn btn-primary w-25">
                Produtos
            </a>
        </div>
    </div>
@endsection
