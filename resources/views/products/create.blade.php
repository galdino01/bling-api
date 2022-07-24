@extends('layouts.app')

@section('content')
    <div class="mt-5 mb-3">
        <h3 class="modal-title" id="products">New Product</h3>
    </div>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('products.inputs')
        <div class="d-flex flex-row justify-content-end mt-5 mb-5">
            <a class="btn btn-danger" href="{{ route('products.index') }}">Cancel</a>
            <button type="submit" class="btn btn-success ms-2">Confirm</button>
        </div>
    </form>
@endsection
