@extends('products.layouts.app')

@section('title', 'Detalhes do produto')

@section('content')
@include('products.partials.breadcrumb')
<div class="py-6">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
        Detalhes do produto: {{ $product->name }}
    </h2>
</div>
<ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400 mb-6">
    <li><b>Nome:</b> {{ $product->name }}</li>
    <li><b>Valor:</b> {{ $product->value }}</li>
    <li><b>Quantidade:</b> {{ $product->amount }}</li>
</ul>
<x-alert />
@can('is-owner', $product)
<form action="{{ route('products.destroy', $product->id) }}" method="post">
    @csrf()
    @method('delete')
    <button type="submit"
        class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Deletar</button>
</form>
@endcan
@endsection