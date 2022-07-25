@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="fw-bold">
            Categories
        </h3>
        <a class="btn btn-outline-primary rounded-pill" href="{{ route('categories.create') }}" title="Create New Category">
            <i class="fa fa-plus me-2" aria-hidden="true"></i>
            Register Category
        </a>
    </div>
    <div class="rounded shadow p-2 bg-white mt-3 mb-3">
        @livewire('category-table')
    </div>
@endsection
