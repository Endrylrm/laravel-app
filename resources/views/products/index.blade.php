@extends('products.layouts.app')

@section('title', 'Lista de produtos')

@section('content')
@include('products.partials.breadcrumb')
<div class="py-1 mb-4">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
        Lista de Produtos
    </h2>

    <a href="{{ route('products.create') }}"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <i class="fa-solid fa-plus" aria-hidden="true"></i> Novo Produto
    </a>
</div>

<x-alert />

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-4">Produto</th>
                <th scope="col" class="px-6 py-4">Valor</th>
                <th scope="col" class="px-6 py-4">Quantidade</th>
                <th scope="col" class="px-6 py-4">Ações</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @forelse ($products as $product)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $product->name }}</td>
                    <td class="px-6 py-4">{{ $product->value }}</td>
                    <td class="px-6 py-4">{{ $product->amount }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                        <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhum produto no banco</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="py-4">
    {{ $products->links() }}
</div>
@endsection