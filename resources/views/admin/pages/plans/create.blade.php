@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <h1>Cadastrar Novo Plano <a href="{{ route('index') }}" class="btn btn-secondary" ><i class="fas fa-arrow-circle-left"></i> Voltar</a></h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('store') }}" class="form" method="POST">
                {{-- @csrf - Token de segurança para os dados do form  --}}
                @csrf

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:">
                </div>
                <div class="form-group">
                    <label>Preço:</label>
                    <input type="text" name="price" class="form-control" placeholder="Preço:">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="text" name="description" class="form-control" placeholder="Descrição:">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection