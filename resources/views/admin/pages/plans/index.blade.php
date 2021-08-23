@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    {{-- Botão cadastro com rota para view de cadastro (form) --}}
    <h1>Planos <a href="{{ route('create') }}" class="btn btn-primary" ><i class="fas fa-plus"></i> Cadastrar</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            #Filtros
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
                                    {{$plan->price}}
                                </td>
                                <td>
                                    <a href="" class="btn btn-warning">Visualizar</a>
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