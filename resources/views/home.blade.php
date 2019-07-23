
<!--Código para pegar os valores do banco da variável em php e coloca em um objeto js -->
<script>
    var listagemPss = {};
</script>
@foreach($listaPss as $pss)
<script>
    //var cargosPresentes = [];
    var listagemCargos = {};
</script>
@foreach($pss->cargos as $carg)
<script>
    listagemCargos['{{$carg->id}}'] = '{{$carg->nome}}'
    //cargosPresentes.push('{{$carg->nome}}');
</script>
@endforeach
<script>
    listagemPss['{{$pss->id}}'] = listagemCargos;
</script>
@endforeach

<!-- <script>
    console.log(listagemPss);
</script> -->

@section('content')

<div class="container">
    <!--Mensagem de sucesso na inscrição-->
    @if(session()->has('mensagemSucessoInscricao'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class=" alert alert-success">
                {{ session()->get('mensagemSucessoInscricao') }}
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('mensagemErroInscricao'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class=" alert alert-danger">
                {{ session()->get('mensagemErroInscricao') }}
            </div>
        </div>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inscrições</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p class="text-justify">Olá, {{$usuario['nome']}}. Selecione o Processo Seletivo Simplificado e o cargo no qual deseja se inscrever:</p>
                    <form method="POST" action="inscricao" class="">
                        <!--Implementar a rota correta -->
                        {{csrf_field()}}
                        <!-- <div class="form-group row">
                            <div class="col-md-6">
                                <input id="idCandidato" type="hidden" class="form-control" name="idCandidato" value="{{ $usuario['id'] }}">
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="pssSelecionado" class="col-md-4 col-form-label text-md-right">{{ __('PSS: ') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="pssSelecionado" name="pssSelecionado">
                                    <option disabled selected>Selecione o PSS</option>
                                    @foreach ($listaPss as $pss)
                                    <option value="{{$pss->id}}">{{$pss->numero}}/{{$pss->ano}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cargoSelecionado" class="col-md-4 col-form-label text-md-right">{{ __('Cargo: ') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="cargoSelecionado" name="cargoSelecionado">
                                    <option disabled selected>Selecione o cargo</option>
                                    <!--Código para colocar hierarquia no combobox -->
                                    <script>
                                        var comboPssSelecionado = document.getElementById('pssSelecionado'),
                                            comboCargos = document.getElementById('cargoSelecionado');

                                        comboPssSelecionado.onchange = function(e) {
                                            var val = e.target.value; //Valor do campoPssSelecioado
                                            empty(comboCargos);


                                            $.each(listagemPss, function(pssID, value) {
                                                $.each(value, function(cargoID, cargoNome) {
                                                    if (val == pssID) {
                                                        addOption(cargoID, cargoNome, comboCargos);
                                                    }
                                                });
                                            });


                                            var idCargo = e.target.value;
                                            var idPss = comboPssSelecionado.value;
                                            var url = ('titulos/idPss/idCargo').replace('idPss', idPss);
                                            url = url.replace('idCargo', idCargo);
                                            console.log(url);
                                            //requisição ajax aqui chamando a url
                                            $.ajax({
                                                type: 'POST',
                                                url: url,
                                                success: function(response) {
                                                    var listaTitulos = JSON.parse(response);

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
                                                        attElementBootstrapColClass.value = "col-md-6 offset-md-4";
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

                                        };

                                        comboCargos.onclick = function(e) {
                                            var idCargo = e.target.value;
                                            var idPss = comboPssSelecionado.value;
                                            var url = ('titulos/idPss/idCargo').replace('idPss', idPss);
                                            url = url.replace('idCargo', idCargo);
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
                                                        attElementBootstrapColClass.value = "col-md-6 offset-md-4";
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
                        <label for="titulos" class="col-md-6 offset-md-4">{{ __('Selecione abaixo os títulos que você possui:') }}</label>

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