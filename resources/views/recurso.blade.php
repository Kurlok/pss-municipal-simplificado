@push('scripts')
<script>
    //Input mask
    $(document).ready(function($) {
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('#cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('#rg').mask('000000000000000');

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

@extends('layouts.app')

@section('content')
<div class="container">
    <!--Mensagem de sucesso no recurso-->
    @if(session()->has('recurso'))
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class=" alert alert-success">
                <?php
                $recursoMostra = session('recurso');
                $dataTempoSQL = $recursoMostra->created_at;
                $dataTempoBR = date('d/m/Y H:i:s', strtotime($dataTempoSQL));
                ?>

                @if (isset($recursoMostra))
                <p>Confirmação de envio de recurso no PSS nº 01/2019 da Prefeitura Municipal de Palmeira-PR:</p>
                <p>Número da inscrição: {{$recursoMostra->id}}</p>
                <p>Inscrição efetuada em: {{$dataTempoBR}}</p>
                <p>Nome: {{$recursoMostra->nome}}</p>
                <p>CPF: {{$recursoMostra->cpf}}</p>
                <p>E-mail: {{$recursoMostra->email}}</p>
                <p>RG: {{$recursoMostra->rg}}</p>
                <p>Telefone: {{$recursoMostra->telefone}}</p>
                <p>Celular: {{$recursoMostra->telefoneAlternativo}}</p>
                <p>Emprego: {{$recursoMostra->emprego}} </p>
                @endif
            </div>
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class=" alert alert-danger">
                Houve um erro no envio de seu recurso, por favor confira se preencheu todos os dados corretamente.
            </div>
        </div>
    </div>
    @endif
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Recurso</div>

                <div class="card-body">

                    <p class="text-justify">Insira seu número de inscrição, RG e CPF.</p>
                    <span class="text-justify small">*</span> <span class="text-justify text-danger small">Campos Obrigatórios</span>
                    <form method="POST" action="{{ route('consultaInscricao') }}" class="">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="id" class="col col-form-label">{{ __('Número da Inscrição:*') }}</label>

                            <div class="col">
                                <input id="idInscricao" type="text" name="idInscricao" class="form-control @error('idInscricao') is-invalid @enderror" maxlength="10" required>

                                @error('idInscricao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="nome" class="col col-form-label">{{ __('Nome completo:*') }}</label>

                            <div class="col">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" maxlength="200" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cpf" class="col col-form-label ">{{ __('CPF:*') }}</label>

                            <div class="col">
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" placeholder="000.000.000-00" value="{{ old('cpf') }}" required autocomplete="cpf">
                                <small id="cpfHelp" class="form-text text-muted">Digite apenas números.</small>

                                @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rg" class="col col-form-label ">{{ __('RG:*') }}</label>
                            <div class="col">
                                <input id="rg" type="text" class="form-control @error('rg') is-invalid @enderror" name="rg" value="{{ old('rg') }}" maxlength="15" required>
                                <small id="rgHelp" class="form-text text-muted">Digite apenas números.</small>
                                @error('rg')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telefone" class="col col-form-label ">{{ __('Telefone:*') }}</label>
                            <div class="col">
                                <input id="telefone" type="text" class="form-control tel @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" maxlength="20" placeholder="(00) 00000-0000" required autocomplete="telefone" autofocus>
                                <small id="telefoneHelp" class="form-text text-muted">Digite apenas números.</small>
                                @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telefoneAlternativo" class="col col-form-label ">{{ __('Telefone Alternativo:') }}</label>
                            <div class="col">
                                <input id="telefoneAlternativo" type="text" class="form-control tel @error('telefoneAlternativo') is-invalid @enderror" name="telefoneAlternativo" value="{{ old('telefoneAlternativo') }}" placeholder="(00) 00000-0000" maxlength="20" autocomplete="telefoneAlternativo" autofocus>
                                <small id="telefoneAlternativoHelp" class="form-text text-muted">Digite apenas números.</small>
                                @error('telefoneAlternativo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col col-form-label ">{{ __('E-mail:*') }}</label>
                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="emprego" class="col col-form-label ">{{ __('Emprego ao qual concorre:* ') }}</label>
                            <div class="col">
                                <select class="form-control @error('emprego') is-invalid @enderror" required id="emprego" name="emprego">
                                    <option disabled selected>Selecione o emprego</option>
                                    @foreach ($listaVagas as $vagas)
                                    <option value="{{$vagas->id}}">{{$vagas->emprego}}</option>
                                    @endforeach
                                </select>
                                @error('emprego')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <div class="col">
                            <label for="fundamentacao">Fundamentação do recurso</label>
                                <textarea class="form-control" id="fundamentacao" rows="25">{{ old('fundamentacao') }}</textarea>
                            </div>
                        </div>

                        <div id="recaptcha" class="form-group row justify-content-center">

                            {!! Recaptcha::render() !!}

                        </div>

                        <div class="form-group mb-0">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- <div id="loading" style="display:none">Your Image</div> -->
                    <!-- Modal -->



                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="modal" id="loading">
    <!-- <div class="loader"></div> -->

</div>

<script>
    $(function() {
        var loading = $("#loading");
        $(document).ajaxStart(function() {
            loading.show();
        });

        $(document).ajaxStop(function() {
            loading.hide();
        });


    });
</script>

@endsection