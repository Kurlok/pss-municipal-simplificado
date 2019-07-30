@extends('layoutadmin.app')


@push('scripts')
<script>
    //Input mask
    $(document).ready(function($) {
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('#cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.tel').mask('(00) 00000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.cpf').mask('000.000.000-00', {
            reverse: true
        });
        $('#cpf').mask('000.000.000-00', {
            reverse: true
        });
        $('.cnpj').mask('00.000.000/0000-00', {
            reverse: true
        });
        $('.money').mask('000.000.000.000.000,00', {
            reverse: true
        });
        $('.money2').mask("#.##0,00", {
            reverse: true
        });
        $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            }
        });
        $('.ip_address').mask('099.099.099.099');
        $('.percent').mask('##0,00%', {
            reverse: true
        });
        $('.clear-if-not-match').mask("00/00/0000", {
            clearIfNotMatch: true
        });
        $('.placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.fallback').mask("00r00r0000", {
            translation: {
                'r': {
                    pattern: /[\/]/,
                    fallback: '/'
                },
                placeholder: "__/__/____"
            }
        });
        $('.selectonfocus').mask("00/00/0000", {
            selectOnFocus: true
        });
    });
</script>
@endpush

@section('content')
<div class="container">
    <!--Mensagem de sucesso na inscrição-->
    @if(session()->has('mensagemSucessoInscricao'))
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class=" alert alert-success">
                {{ session()->get('mensagemSucessoInscricao') }}
            </div>
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class=" alert alert-danger">
                Houve um erro na sua inscrição, por favor confira todos os dados.
            </div>
        </div>
    </div>
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Inscrições</div>
                <div class="card-body">
                    <p class="text-justify">Preencha os dados abaixo para realizar a sua inscrição no Processo Seletivo Simplificado nº 01/2009:</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection