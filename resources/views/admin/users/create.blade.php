@extends('admin.layouts.app')

@section('title', 'Cadastrar usuário')

@section('content')
<h1>Novo Usuário</h1>

<form action="{{ route('users.store') }}" method="post">
    @include('admin.users.partials.form')
</form>
@endsection