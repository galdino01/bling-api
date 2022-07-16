@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row align-items-center justify-content-between w-100 mt-5">
        <h4>Produtos</h4>
    </div>
    <div class="rounded shadow p-2 bg-white mb-5">
        @livewire('product-table')
    </div>
@endsection
