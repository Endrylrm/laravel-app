@extends('products.layouts.app')

@section('title', 'Editar produto')

@section('content')
@include('products.partials.breadcrumb')
<div class="py-6">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
        Editar o Produto {{ $product->name }}
    </h2>
</div>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @method('put')
    @include('products.partials.form')
</form>
@endsection