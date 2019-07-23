@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Inscrições</div>

                <div class="card-body">

                    <p class="text-justify">Selecione o emprego no qual deseja se inscrever:</p>
                    <form method="POST" action="inscricao" class="">
                        <!--Implementar a rota correta -->
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="cargoSelecionado" class="col-lg-2 col-form-label">{{ __('Emprego: ') }}</label>
                            <div class="col-lg-10">
                                <select class="form-control" id="cargoSelecionado" name="cargoSelecionado">
                                    <option disabled selected>Selecione o emprego</option>
                                    @foreach ($listaVagas as $vagas)
                                    <option value="{{$vagas->id}}">{{$vagas->emprego}}</option>

                                    @endforeach
                                    <!--Código para colocar hierarquia no combobox -->
                                    <script>
                                            comboCargos = document.getElementById('cargoSelecionado');

                                        comboCargos.onclick = function(e) {
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

                                                    parentElement = document.getElementById('titulos');
                                                    empty(parentElement);

                                                    for (let titulo of listaTitulos) {
                                                        elementFormRow = document.createElement("div");
                                                        var attFormRowClass = document.createAttribute("class");
                                                        attFormRowClass.value = "form-group row";
                                                        elementFormRow.setAttributeNode(attFormRowClass);
                                                        appendElementFormRow = parentElement.appendChild(elementFormRow);

                                                        elementBootstrapCol = document.createElement("div");
                                                        var attElementBootstrapColClass = document.createAttribute("class");
                                                        attElementBootstrapColClass.value = "col-lg-10";
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
                                                            attElementInputID.value = "titulo" + titulo.id;
                                                        var attElementInputName = document.createAttribute("name");
                                                            attElementInputName.value = "titulo" + titulo.id;
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
                                                            attElementLabelFor.value = "titulo" + titulo.id;

                                                            elementLabel.setAttributeNode(attElementLabelClass);
                                                            elementLabel.setAttributeNode(attElementLabelFor);

                                                        appendElementLabel = appendFormCheck.appendChild(elementLabel);
                                                        appendElementLabel.innerHTML = titulo.nome + " - " + titulo.pontos + " pontos";
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

                                </select>
                            </div>
                        </div>
                        <label for="titulos">{{ __('Selecione abaixo os títulos que você possui:') }}</label>

                        <div id="titulos">
                            <!-- <div class="form-group row">

                                <div class="col-md-6 offset-md-4">
                                    
                                    <div class="form-check">
                                        <input type="checkbox" id="titulo1" class="form-check-input">
                                        <label for="titulo1" class="form-check-label">
                                            Titulo 1
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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