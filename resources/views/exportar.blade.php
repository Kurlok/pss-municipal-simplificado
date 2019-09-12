@extends('layoutadmin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-info text-white">Exportar</div>
                <div class="card-body">
                    <p class="text-justify">Escolha o que deseja exportar:</p>
                    <a href="{{ route('exportarInscricoes') }}">
                                    {{ __('Exportar Inscrições') }}
                    </a>
                    <br/>
                    @if (Route::has('exportarRecursos'))
                    <a href="{{ route('exportarRecursos') }}">
                                    {{ __('Exportar Recursos') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection