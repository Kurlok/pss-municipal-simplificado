<?php
    $dataTempoSQL = $inscricao->created_at;
    $dataTempoBR = date('d/m/Y H:i:s', strtotime($dataTempoSQL));

    $dataSQL = $inscricao->dataNascimento;
    $dataBR = date('d/m/Y', strtotime($dataSQL));
?>

<p>Confirmação de Inscrição no PSS nº 01/2019 da Prefeitura Municipal de Palmeira-PR. Os dados abaixos pertencem a sua inscrição:</p>
<p>Número da inscrição: {{$inscricao->id}}</p>
<p>Inscrição efetuada em: {{$dataTempoBR}}</p>
<p>Nome: {{$inscricao->nome}}</p>
<p>Data de nascimento: {{$dataBR}}</p>
<p>CPF: {{$inscricao->cpf}}</p>
<p>E-mail: {{$inscricao->email}}</p>
<p>RG: {{$inscricao->rg}}</p>
<p>RG - UF: {{$inscricao->ufRg}}</p>
<p>RG - Orgão Expedidor: {{$inscricao->orgaoExpedidor}}</p>
<p>Sexo: {{$inscricao->sexo}}</p>
<p>Telefone: {{$inscricao->telefone}}</p>
<p>Telefone Alternativo {{$inscricao->telefoneAlternativo}}</p>
<p>CEP: {{$inscricao->cep}}</p>
<p>UF: {{$inscricao->uf}}</p>
<p>Cidade: {{$inscricao->cidade}}</p>
<p>Rua: {{$inscricao->rua}}</p>
<p>Numero: {{$inscricao->numero}}</p>
<p>Complemento: {{$inscricao->complemento}}</p>
<p>Emprego: {{$emprego->emprego}} </p>
<p>Títulos possuídos: </p>
@foreach($inscricao->titulos as $tit)
    <p>{{$tit->titulo}} (valor do título: {{$tit->pontos}} pontos).</p>
@endforeach 
