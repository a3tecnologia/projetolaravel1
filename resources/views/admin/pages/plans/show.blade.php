@extends('adminlte::page')

@section('title', "Detalhes do - $plan->name ")

@section('content_header')
    <h1>Detalhes do - <b> {{ $plan->name }}</b> <a href="{{ route('index') }}" class="btn btn-secondary" ><i class="fas fa-arrow-circle-left"></i> Voltar</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$plan->name }}
                </li>
                {{-- <li>
                    <strong>URL:</strong>{{$plan->url}}
                </li> --}}
                <li>
                    <strong>Preço: </strong>R$ {{ number_format($plan->price, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Descrição: </strong>{{$plan->description}}
                </li>
            </ul>

            <form action="{{ route('destroy', $plan->url) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"> Excluir - {{$plan->name }}</button>
            </form>
        </div>
    </div>
@endsection