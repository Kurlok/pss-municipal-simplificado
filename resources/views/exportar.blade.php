@extends('layoutadmin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Exportar</div>
                <div class="card-body">
                    <p class="text-justify">Escolha o que deseja exportar:</p>
                    <a href="{{ route('exportarInscricoes') }}">
                                    {{ __('Exportar Inscrições') }}
                    </a>
                    <br/>
                    {{--
                    <a href="{{ route('exportarInscricoesTitulos') }}">
                                    {{ __('Exportar Relação Inscrição/Títulos') }}
                    </a>
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection