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

@section('content')
<div class="container">
    <!--Mensagem de sucesso na inscrição-->
    @if(session()->has('mensagemSucessoInscricao'))
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class=" alert alert-success">
                {{ session()->get('mensagemSucessoInscricao') }}
            </div>
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class=" alert alert-danger">
                Houve um erro na sua inscrição, por favor confira se preencheu todos os dados e se selecionou pelo menos um título para o cargo desejado.
            </div>
        </div>
    </div>
    @endif

</div>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header bg-primary text-white">Inscrição</div>

                <div class="card-body">

                    <p class="text-justify">Realize a sua inscrição no Processo Seletivo Simplificado nº 01/2019 da Prefeitura Municipal de Palmeira preenchendo o formulário abaixo:</p>
                    <span class="text-justify small">*</span> <span class="text-justify text-danger small">Campos Obrigatórios</span>
                    <form method="POST" action="inscricao" class="">
                        <!--Implementar a rota correta -->
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="nome" class="col col-form-label">{{ __('Nome completo:*') }}</label>

                            <div class="col">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror @if(session()->has('erroTamanhoNome')) is-invalid @endif" name="nome" maxlength="200" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

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
                                <input id="dataNascimento" type="date" class="form-control @error('dataNascimento') is-invalid @enderror" name="dataNascimento" value="{{ old('dataNascimento') }}" min="1944-09-01" max="2004-01-01" required autofocus>
                                <small id="dataNascimentoHelp" class="form-text text-muted">A data de nascimento deve ser posterior à 01/09/1944.</small>

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
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" placeholder="000.000.000-00" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>
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
                                <input id="rg" type="text" class="form-control @error('rg') is-invalid @enderror" name="rg" value="{{ old('rg') }}" maxlength="15" required autofocus>
                                <small id="rgHelp" class="form-text text-muted">Digite apenas números.</small>
                                @error('rg')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{--
                        <div class="form-group">
                            <label for="ufRg" class="col col-form-label ">{{ __('RG - UF:*') }}</label>
                        <div class="col">
                            <select required class="form-control @error('ufRg') is-invalid @enderror" id="ufRg"  name="ufRg">
                                <option disabled selected>Selecione o estado</option>
                                <option value="AC" @if(old('ufRg')=='AC' ) selected @endif>Acre - AC</option>
                                <option value="AL" @if(old('ufRg')=='AL' ) selected @endif>Alagoas - AL</option>
                                <option value="AP" @if(old('ufRg')=='AP' ) selected @endif>Amapá - AP</option>
                                <option value="AM" @if(old('ufRg')=='AM' ) selected @endif>Amazonas - AM</option>
                                <option value="BA" @if(old('ufRg')=='BA' ) selected @endif>Bahia - BA</option>
                                <option value="CE" @if(old('ufRg')=='CE' ) selected @endif>Ceará - CE</option>
                                <option value="DF" @if(old('ufRg')=='DF' ) selected @endif>Distrito Federal - DF</option>
                                <option value="ES" @if(old('ufRg')=='ES' ) selected @endif>Espírito Santo - ES</option>
                                <option value="GO" @if(old('ufRg')=='GO' ) selected @endif>Goiás - GO</option>
                                <option value="MA" @if(old('ufRg')=='MA' ) selected @endif>Maranhão - MA</option>
                                <option value="MT" @if(old('ufRg')=='MT' ) selected @endif>Mato Grosso - MT</option>
                                <option value="MS" @if(old('ufRg')=='MS' ) selected @endif>Mato Grosso do Sul - MS</option>
                                <option value="MG" @if(old('ufRg')=='MG' ) selected @endif>Minas Gerais - MG</option>
                                <option value="PA" @if(old('ufRg')=='PA' ) selected @endif>Pará - PA</option>
                                <option value="PB" @if(old('ufRg')=='PB' ) selected @endif>Paraíba - PB</option>
                                <option value="PR" @if(old('ufRg')=='PR' ) selected @endif>Paraná - PR</option>
                                <option value="PE" @if(old('ufRg')=='PE' ) selected @endif>Pernambuco - PE</option>
                                <option value="PI" @if(old('ufRg')=='PI' ) selected @endif>Piauí - PI</option>
                                <option value="RJ" @if(old('ufRg')=='RJ' ) selected @endif>Rio de Janeiro - RJ</option>
                                <option value="RN" @if(old('ufRg')=='RN' ) selected @endif>Rio Grande do Norte - RN</option>
                                <option value="RS" @if(old('ufRg')=='RS' ) selected @endif>Rio Grande do Sul - RS</option>
                                <option value="RO" @if(old('ufRg')=='RO' ) selected @endif>Rondônia - RO</option>
                                <option value="RR" @if(old('ufRg')=='RR' ) selected @endif>Roraima - RR</option>
                                <option value="SC" @if(old('ufRg')=='SC' ) selected @endif>Santa Catarina - SC</option>
                                <option value="SP" @if(old('ufRg')=='SP' ) selected @endif>São Paulo - SP</option>
                                <option value="SE" @if(old('ufRg')=='SE' ) selected @endif>Sergipe - SE</option>
                                <option value="TO" @if(old('ufRg')=='TO' ) selected @endif>Tocantins - TO</option>
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
                --}}
                <div class="form-group">
                    <label for="sexo" class="col col-form-label ">{{ __('Sexo:*') }}</label>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input  @error('sexo') is-invalid @enderror" type="radio" name="sexo" id="sexoMasculino" required value="Masculino" @if(old('sexo')=='Masculino' ) checked @endif>
                            <label class="form-check-label" for="sexoMasculino">Masculino</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input  @error('sexo') is-invalid @enderror" type="radio" name="sexo" id="sexoFeminino" value="Feminino" @if(old('sexo')=='Feminino' ) checked @endif>
                            <label class="form-check-label" for="sexoFeminino">Feminino</label>
                            @error('sexo')
                            <br />
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
                    <label for="telefoneAlternativo" class="col col-form-label ">{{ __('Celular*:') }}</label>
                    <div class="col">
                        <input id="telefoneAlternativo" type="text" class="form-control tel @error('telefoneAlternativo') is-invalid @enderror" name="telefoneAlternativo" value="{{ old('telefoneAlternativo') }}" placeholder="(00) 00000-0000" maxlength="20" autocomplete="telefoneAlternativo" required autofocus>
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
                        <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ old('cep') }}" placeholder="00000-000" required autocomplete="cep" autofocus>
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
                        <select required class="form-control @error('uf') is-invalid @enderror" id="uf" name="uf">
                            <option disabled selected>Selecione o estado</option>
                            <option value="AC" @if(old('uf')=='AC' ) selected @endif>Acre - AC</option>
                            <option value="AL" @if(old('uf')=='AL' ) selected @endif>Alagoas - AL</option>
                            <option value="AP" @if(old('uf')=='AP' ) selected @endif>Amapá - AP</option>
                            <option value="AM" @if(old('uf')=='AM' ) selected @endif>Amazonas - AM</option>
                            <option value="BA" @if(old('uf')=='BA' ) selected @endif>Bahia - BA</option>
                            <option value="CE" @if(old('uf')=='CE' ) selected @endif>Ceará - CE</option>
                            <option value="DF" @if(old('uf')=='DF' ) selected @endif>Distrito Federal - DF</option>
                            <option value="ES" @if(old('uf')=='ES' ) selected @endif>Espírito Santo - ES</option>
                            <option value="GO" @if(old('uf')=='GO' ) selected @endif>Goiás - GO</option>
                            <option value="MA" @if(old('uf')=='MA' ) selected @endif>Maranhão - MA</option>
                            <option value="MT" @if(old('uf')=='MT' ) selected @endif>Mato Grosso - MT</option>
                            <option value="MS" @if(old('uf')=='MS' ) selected @endif>Mato Grosso do Sul - MS</option>
                            <option value="MG" @if(old('uf')=='MG' ) selected @endif>Minas Gerais - MG</option>
                            <option value="PA" @if(old('uf')=='PA' ) selected @endif>Pará - PA</option>
                            <option value="PB" @if(old('uf')=='PB' ) selected @endif>Paraíba - PB</option>
                            <option value="PR" @if(old('uf')=='PR' ) selected @endif>Paraná - PR</option>
                            <option value="PE" @if(old('uf')=='PE' ) selected @endif>Pernambuco - PE</option>
                            <option value="PI" @if(old('uf')=='PI' ) selected @endif>Piauí - PI</option>
                            <option value="RJ" @if(old('uf')=='RJ' ) selected @endif>Rio de Janeiro - RJ</option>
                            <option value="RN" @if(old('uf')=='RN' ) selected @endif>Rio Grande do Norte - RN</option>
                            <option value="RS" @if(old('uf')=='RS' ) selected @endif>Rio Grande do Sul - RS</option>
                            <option value="RO" @if(old('uf')=='RO' ) selected @endif>Rondônia - RO</option>
                            <option value="RR" @if(old('uf')=='RR' ) selected @endif>Roraima - RR</option>
                            <option value="SC" @if(old('uf')=='SC' ) selected @endif>Santa Catarina - SC</option>
                            <option value="SP" @if(old('uf')=='SP' ) selected @endif>São Paulo - SP</option>
                            <option value="SE" @if(old('uf')=='SE' ) selected @endif>Sergipe - SE</option>
                            <option value="TO" @if(old('uf')=='TO' ) selected @endif>Tocantins - TO</option>
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
                    <label for="bairro" class="col col-form-label ">{{ __('Bairro:*') }}</label>
                    <div class="col">
                        <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ old('bairro') }}" maxlength="100" required autocomplete="bairro" autofocus>
                        @error('bairro')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="rua" class="col col-form-label ">{{ __('Endereço:*') }}</label>
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
                        <small id="numeroHelp" class="form-text text-muted">Digite S/N caso sua residência não possua número.</small>

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
                <label for="deficiencia" class="col col-form-label">{{ __('Possui alguma deficiência?*') }}</label>

                <div class="form-group">

                    <div class="col">
                        <select class="form-control @error('deficiencia') is-invalid @enderror" required id="deficiencia" name="deficiencia">
                            <option value="Não" @if(old('deficiencia') !='Sim' ) selected @endif>Não</option>
                            <option value="Sim" @if(old('deficiencia')=='Sim' ) selected @endif>Sim</option>
                        </select>
                    </div>

                    <div class="col">
                        <input id="deficienciaDescricao" type="text" class="form-control @error('deficienciaDescricao') is-invalid @enderror" name="deficienciaDescricao" value="{{ old('deficienciaDescricao') }}" placeholder="Em caso afirmativo, especifique a deficiência aqui" maxlength="200" @if(old('deficiencia') !='Sim' ) disabled @endif>
                        @error('deficienciaDescricao')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("#deficiencia").change(function() {
                                if ($(this).find('option:selected').text() == 'Não') {
                                    $('#deficienciaDescricao').prop("disabled", true);
                                } else {
                                    $('#deficienciaDescricao').prop("disabled", false);
                                    $('#deficienciaDescricao').prop("required", true);

                                }
                            });
                        });
                    </script>
                </div>

                <div class="form-group">
                    <label for="emprego" class="col col-form-label ">{{ __('Emprego:* ') }}</label>
                    <div class="col">
                        <select class="form-control @error('emprego') is-invalid @enderror @if(null !== old('emprego')) is-invalid @endif" required id="emprego" name="emprego">
                            <option disabled selected>Selecione o emprego</option>
                            @foreach ($listaVagas as $vagas)
                            <option value="{{$vagas->id}}">{{$vagas->emprego}}</option>
                            @endforeach
                        </select>
                        @if(null !== old('emprego'))
                        <span class="invalid-feedback" role="alert">
                            <strong>O campo Emprego é obrigatório e é necessário selecionar pelo menos um título.</strong>
                        </span>
                        @endif
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
                                //console.log(url);
                                //requisição ajax aqui chamando a url
                                $("#LoadMe").show();

                                $.ajax({
                                    type: 'POST',
                                    url: url,
                                    success: function(response) {
                                        var listaTitulos = JSON.parse(response);
                                        //console.log(listaTitulos);

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
                                            attElementInputID.value = "titulo" + $i;
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
                                            attElementLabelClass.value = "form-check-label";
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