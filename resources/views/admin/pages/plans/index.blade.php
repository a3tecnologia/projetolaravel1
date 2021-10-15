@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    {{-- message vindo do controller --}}
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.home') }}">Planos</a></li>
        </ol>
    </nav>

    {{-- Botão cadastro com rota para view de cadastro (form) --}}
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-primary" ><i class="fas fa-plus-square"></i> Adicionar</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            {{-- #Filtros  --}}
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form form-control" value="{{ $filters['filter'] ?? ''}}">&nbsp&nbsp
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
                                    <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info"> <i class="far fa-edit"></i> Editar</a>&nbsp&nbsp
                                    <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning"> <i class="far fa-eye"></i> Visualizar</a>
                                </td>                                                   
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        {{-- Div Link paginação --}}
        <div class="card-footer">
            @if (isset($filters))
                 {!! $plans->appends($filters)->links()!!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop