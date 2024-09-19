@extends('products.layouts.app')

@section('title', 'Cadastrar produto')

@section('content')
    @include('products.partials.breadcrumb')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
            Novo Produto
        </h2>
    </div>
    <form action="{{ route('products.store') }}" method="POST">
        @include('products.partials.form')
    </form>
@endsection