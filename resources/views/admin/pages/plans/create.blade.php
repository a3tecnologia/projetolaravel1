@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <h1>Cadastrar Novo Plano <a href="{{ route('plans.index') }}" class="btn btn-secondary" ><i class="fas fa-arrow-circle-left"></i> Voltar</a></h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                {{-- @csrf - Token de segurança para os dados do form  --}}
                @csrf
                
                @include('admin.pages.plans._partials.form')

            </form>
        </div>
    </div>
@endsection