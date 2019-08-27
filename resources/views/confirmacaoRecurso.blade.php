<?php
    $dataTempoSQL = $recurso->created_at;
    $dataTempoBR = date('d/m/Y H:i:s', strtotime($dataTempoSQL));
?>

<p>Confirmação de envio de recurso no PSS nº 01/2019 da Prefeitura Municipal de Palmeira-PR. Os dados abaixos pertencem ao dados inseridos pelo e-mail informado no envio do recurso:</p>
<p>Número do recurso: {{$recurso->id}}</p>
<p>Recurso efetuado em: {{$dataTempoBR}}</p>
<p>Número da inscrição: {{$recurso->idInscricao}}</p>
<p>Nome: {{$recurso->nome}}</p>
<p>CPF: {{$recurso->cpf}}</p>
<p>E-mail: {{$recurso->email}}</p>
<p>RG: {{$recurso->rg}}</p>
<p>Telefone: {{$recurso->telefone}}</p>
<p>Celular: {{$recurso->telefoneAlternativo}}</p>
<p>Emprego: {{$recurso->emprego}}</p>
<p>Fundamentação do recurso: {{$recurso->fundamentacao}}</p>
