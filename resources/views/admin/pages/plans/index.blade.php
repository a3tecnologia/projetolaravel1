@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    {{-- message vindo do controller --}}
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    {{-- Botão cadastro com rota para view de cadastro (form) --}}
    <h1>Planos <a href="{{ route('create') }}" class="btn btn-primary" ><i class="fas fa-plus"></i> Cadastrar</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            {{-- #Filtros  --}}
            <form action="{{ route('search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form form-control">&nbsp&nbsp
                <button class="btn btn-dark"> <i class="fas fa-search"></i> Pesquisar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead class="thead-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th style="width: 20%">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($plans as $plan)
                            <tr>
                                <td>
                                    {{$plan->name}}
                                </td>
                                <td>
                                    R$ {{ number_format($plan->price, 2, ',', '.') }}
                                </td>
                                <td>
                                    <a href="{{ route('show', $plan->url) }}" class="btn btn-warning"> <i class="far fa-eye"></i> Visualizar</a>
                                </td>                                                   
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        {{-- Div Link paginação --}}
        <div class="card-footer">
            {!! $plans->links() !!}
        </div>
    </div>
@stop