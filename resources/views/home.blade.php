@extends('layouts.app')


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
                Houve um erro na sua inscrição, por favor confira se preencheu todos os dados e se selecionou pelo menos um título para o cargo desejado.
            </div>
        </div>
    </div>
    @endif

</div>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Inscrições</div>

                <div class="card-body">

                    <p class="text-justify">Preencha os dados abaixo para realizar a sua inscrição no Processo Seletivo Simplificado nº 01/2009:</p>
                    <span class="text-justify small">*</span> <span class="text-justify text-danger small">Campos Obrigatórios</span>
                    <form method="POST" action="inscricao" class="">
                        <!--Implementar a rota correta -->
                        {{csrf_field()}}
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
                            <label for="dataNascimento" class="col col-form-label">{{ __('Data de Nascimento:*') }}</label>

                            <div class="col">
                                <input id="dataNascimento" type="date" class="form-control @error('dataNascimento') is-invalid @enderror" name="dataNascimento" maxlength="200" value="{{ old('dataNascimento') }}" min="1944-08-01" required autofocus>
                                <small id="dataNascimentoHelp" class="form-text text-muted">A data de nascimento deve ser posterior à 01/08/1944.</small>

                                @error('dataNascimento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cpf" class="col col-form-label ">{{ __('CPF:*') }}</label>

                            <div class="col">
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>

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
                                <input id="rg" type="text" class="form-control @error('rg') is-invalid @enderror" name="rg" value="{{ old('rg') }}" maxlength="13" required autocomplete="rg" autofocus>
                                <small id="rgHelp" class="form-text text-muted">Digite sem espaços ou pontuações.</small>
                                @error('rg')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ufRg" class="col col-form-label ">{{ __('UF - RG:*') }}</label>
                            <div class="col">
                                <select class="form-control @error('ufRg') is-invalid @enderror" id="ufRg" name="ufRg">
                                    <option disabled selected>Selecione o estado</option>
                                    <option value="AC">Acre - AC</option>
                                    <option value="AL">Alagoas - AL</option>
                                    <option value="AP">Amapá - AP</option>
                                    <option value="AM">Amazonas - AM</option>
                                    <option value="BA">Bahia - BA</option>
                                    <option value="CE">Ceará - CE</option>
                                    <option value="DF">Distrito Federal - DF</option>
                                    <option value="ES">Espírito Santo - ES</option>
                                    <option value="GO">Goiás - GO</option>
                                    <option value="MA">Maranhão - MA</option>
                                    <option value="MT">Mato Grosso - MT</option>
                                    <option value="MS">Mato Grosso do Sul - MS</option>
                                    <option value="MG">Minas Gerais - MG</option>
                                    <option value="PA">Pará - PA</option>
                                    <option value="PB">Paraíba - PB</option>
                                    <option value="PR">Paraná - PR</option>
                                    <option value="PE">Pernambuco - PE</option>
                                    <option value="PI">Piauí - PI</option>
                                    <option value="RJ">Rio de Janeiro - RJ</option>
                                    <option value="RN">Rio Grande do Norte - RN</option>
                                    <option value="RS">Rio Grande do Sul - RS</option>
                                    <option value="RO">Rondônia - RO</option>
                                    <option value="RR">Roraima - RR</option>
                                    <option value="SC">Santa Catarina - SC</option>
                                    <option value="SP">São Paulo - SP</option>
                                    <option value="SE">Sergipe - SE</option>
                                    <option value="TO">Tocantins - TO</option>
                                </select>
                                @error('ufRg')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="orgaoExpedidor" class="col col-form-label ">{{ __('RG - Órgão Expedidor:*') }}</label>
                            <div class="col">
                                <input id="orgaoExpedidor" type="text" class="form-control @error('orgaoExpedidor') is-invalid @enderror" name="orgaoExpedidor" value="{{ old('orgaoExpedidor') }}" maxlength="100" required autocomplete="orgaoExpedidor" autofocus>
                                @error('orgaoExpedidor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sexo" class="col col-form-label ">{{ __('Sexo:*') }}</label>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input  @error('sexo') is-invalid @enderror" type="radio" name="sexo" id="sexoMasculino" value="Masculino">
                                    <label class="form-check-label" for="sexoMasculino">Masculino</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input  @error('sexo') is-invalid @enderror" type="radio" name="sexo" id="sexoFeminino" value="Feminino">
                                    <label class="form-check-label" for="sexoFeminino">Feminino</label>
                                    @error('sexo')
                                    <br/>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefone" class="col col-form-label ">{{ __('Telefone:*') }}</label>
                            <div class="col">
                                <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" maxlength="20" required autocomplete="telefone" autofocus>
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
                                <input id="telefoneAlternativo" type="text" class="form-control @error('telefoneAlternativo') is-invalid @enderror" name="telefoneAlternativo" value="{{ old('telefoneAlternativo') }}" maxlength="20" autocomplete="telefoneAlternativo" autofocus>
                                <small id="telefoneAlternativoHelp" class="form-text text-muted">Digite apenas números.</small>
                                @error('telefoneAlternativo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cep" class="col col-form-label ">{{ __('CEP:*') }}</label>
                            <div class="col">
                                <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ old('cep') }}" required autocomplete="cep" autofocus>
                                <small id="cepHelp" class="form-text text-muted">Digite apenas números.</small>
                                @error('cep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="uf" class="col col-form-label ">{{ __('UF:*') }}</label>
                            <div class="col">
                                <select class="form-control @error('uf') is-invalid @enderror" id="uf" name="uf">
                                    <option disabled selected>Selecione o estado</option>
                                    <option value="AC">Acre - AC</option>
                                    <option value="AL">Alagoas - AL</option>
                                    <option value="AP">Amapá - AP</option>
                                    <option value="AM">Amazonas - AM</option>
                                    <option value="BA">Bahia - BA</option>
                                    <option value="CE">Ceará - CE</option>
                                    <option value="DF">Distrito Federal - DF</option>
                                    <option value="ES">Espírito Santo - ES</option>
                                    <option value="GO">Goiás - GO</option>
                                    <option value="MA">Maranhão - MA</option>
                                    <option value="MT">Mato Grosso - MT</option>
                                    <option value="MS">Mato Grosso do Sul - MS</option>
                                    <option value="MG">Minas Gerais - MG</option>
                                    <option value="PA">Pará - PA</option>
                                    <option value="PB">Paraíba - PB</option>
                                    <option value="PR">Paraná - PR</option>
                                    <option value="PE">Pernambuco - PE</option>
                                    <option value="PI">Piauí - PI</option>
                                    <option value="RJ">Rio de Janeiro - RJ</option>
                                    <option value="RN">Rio Grande do Norte - RN</option>
                                    <option value="RS">Rio Grande do Sul - RS</option>
                                    <option value="RO">Rondônia - RO</option>
                                    <option value="RR">Roraima - RR</option>
                                    <option value="SC">Santa Catarina - SC</option>
                                    <option value="SP">São Paulo - SP</option>
                                    <option value="SE">Sergipe - SE</option>
                                    <option value="TO">Tocantins - TO</option>
                                </select>
                            @error('uf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="cidade" class="col col-form-label ">{{ __('Cidade:*') }}</label>
                            <div class="col">
                                <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{ old('cidade') }}" maxlength="100" required autocomplete="cidade" autofocus>
                                @error('cidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rua" class="col col-form-label ">{{ __('Rua:*') }}</label>
                            <div class="col">
                                <input id="rua" type="text" class="form-control @error('rua') is-invalid @enderror" name="rua" value="{{ old('rua') }}" maxlength="100" required autocomplete="rua" autofocus>
                                @error('rua')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="numero" class="col col-form-label ">{{ __('Número:*') }}</label>
                            <div class="col">
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" maxlength="10" required autocomplete="numero" autofocus>
                                @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="complemento" class="col col-form-label ">{{ __('Complemento:') }}</label>
                            <div class="col">
                                <input id="complemento" type="text" class="form-control @error('complemento') is-invalid @enderror" name="complemento" value="{{ old('complemento') }}" maxlength="100" autocomplete="complemento" autofocus>
                                @error('complemento')
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
                            <label for="emprego" class="col col-form-label ">{{ __('Emprego:* ') }}</label>
                            <div class="col">
                                <select class="form-control @error('emprego') is-invalid @enderror" id="emprego" name="emprego">
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
                                 <!--Código para puxar os títulos -->
                                    <script>
                                        comboCargos = document.getElementById('emprego');

                                        comboCargos.onchange = function(e) {
                                            var idCargo = e.target.value;
                                            var url = ('titulos/idCargo').replace('idCargo', idCargo);
                                            console.log(url);
                                            //requisição ajax aqui chamando a url
                                            $.ajax({
                                                type: 'POST',
                                                url: url,
                                                success: function(response) {
                                                    var listaTitulos = JSON.parse(response);
                                                    console.log(listaTitulos);

                                                    titulosLabelElement = document.getElementById('titulosLabel');
                                                    empty(titulosLabelElement);
                                                    titulosLabelElement.innerHTML = "Selecione os títulos que você possui para o emprego " + comboCargos.options[comboCargos.selectedIndex].innerHTML + ":";


                                                    parentElement = document.getElementById('titulos');
                                                    empty(parentElement);
                                                    $i = 1;
                                                    for (let titulo of listaTitulos) {
                                                        elementFormRow = document.createElement("div");
                                                        var attFormRowClass = document.createAttribute("class");
                                                        attFormRowClass.value = "form-group";
                                                        elementFormRow.setAttributeNode(attFormRowClass);
                                                        appendElementFormRow = parentElement.appendChild(elementFormRow);

                                                        elementBootstrapCol = document.createElement("div");
                                                        var attElementBootstrapColClass = document.createAttribute("class");
                                                        attElementBootstrapColClass.value = "col";
                                                        elementBootstrapCol.setAttributeNode(attElementBootstrapColClass);
                                                        appendElementBootstrapCol = appendElementFormRow.appendChild(elementBootstrapCol);

                                                        elementFormCheck = document.createElement('div');
                                                        var attElementFormCheckClass = document.createAttribute("class");
                                                        attElementFormCheckClass.value = "form-check";
                                                        elementFormCheck.setAttributeNode(attElementFormCheckClass);
                                                        appendFormCheck = appendElementBootstrapCol.appendChild(elementFormCheck);

                                                        elementInput = document.createElement('input');
                                                        var attElementInputClass = document.createAttribute("class");
                                                        attElementInputClass.value = "form-check-input";
                                                        var attType = document.createAttribute("type");
                                                        attType.value = "checkbox";
                                                        var attElementInputID = document.createAttribute("id");
                                                        attElementInputID.value = "titulo[]";
                                                        var attElementInputName = document.createAttribute("name");
                                                        attElementInputName.value = "titulo[]";
                                                        var attElementInputValue = document.createAttribute("value");
                                                        attElementInputValue.value = titulo.id;

                                                        elementInput.setAttributeNode(attElementInputClass);
                                                        elementInput.setAttributeNode(attType);
                                                        elementInput.setAttributeNode(attElementInputID);
                                                        elementInput.setAttributeNode(attElementInputName);
                                                        elementInput.setAttributeNode(attElementInputValue);

                                                        appendElementInput = appendFormCheck.appendChild(elementInput);

                                                        elementLabel = document.createElement('label');
                                                        var attElementLabelClass = document.createAttribute("class");
                                                        attElementLabelClass.value = "check-label";
                                                        var attElementLabelFor = document.createAttribute("for");
                                                        attElementLabelFor.value = "titulo" + $i;

                                                        elementLabel.setAttributeNode(attElementLabelClass);
                                                        elementLabel.setAttributeNode(attElementLabelFor);

                                                        appendElementLabel = appendFormCheck.appendChild(elementLabel);
                                                        appendElementLabel.innerHTML = titulo.titulo + " (" + titulo.pontos + " pontos).";
                                                        $i++;
                                                    }

                                                },
                                                error: function(response) {
                                                    console.log(response);
                                                }
                                            });
                                        }

                                        function empty(select) {
                                            select.innerHTML = '';
                                        }

                                        function addOption(id, nome, select) {
                                            var option = document.createElement('option');
                                            option.value = id; //ID do cargo
                                            option.innerHTML = nome; //Nome do cargo
                                            select.appendChild(option);
                                        }
                                    </script>

                            </div>
                        </div>
                        <label id="titulosLabel" for="titulos"></label>

                        <div id="titulos">
                            <!-- <div class="form-group">

                                <div class="col-md-6 offset-md-4">
                                    
                                    <div class="form-check">
                                        <input type="checkbox" id="titulo1" class="form-check-input">
                                        <label for="titulo1" class="form-check-label">
                                            Titulo 1
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" id="titulo2" class="form-check-input">
                                        <label for="titulo2" class="form-check-label">
                                            Titulo 2
                                        </label>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div id="recaptcha" class="form-group row justify-content-center">

                        {!! Recaptcha::render() !!}

                         </div>

                        <div class="form-group mb-0">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Inscrever-se') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection