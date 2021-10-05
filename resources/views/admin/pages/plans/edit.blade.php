@extends('adminlte::page')

@section('title', 'Editar Plano')

@section('content_header')
    <h1>Editar Plano - <b> {{ $plan->name }}</b> <a href="{{ route('index') }}" class="btn btn-secondary" ><i class="fas fa-arrow-circle-left"></i> Voltar</a></h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update', $plan->url) }}" class="form" method="POST">
                {{-- @csrf - Token de segurança para os dados do form  --}}
                @csrf
                @method('PUT')

                @include('admin.pages.plans._partials.form')
                
            </form>
        </div>
    </div>
@endsection