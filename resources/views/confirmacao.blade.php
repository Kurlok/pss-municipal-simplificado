<?php
    $dataTempoSQL = $inscricao->created_at;
    $dataTempoBR = date('d/m/Y H:i:s', strtotime($dataTempoSQL));

    $dataSQL = $inscricao->dataNascimento;
    $dataBR = date('d/m/Y', strtotime($dataSQL));
?>

<p>Confirmação de Inscrição no PSS nº 01/2019 da Prefeitura Municipal de Palmeira-PR. Os dados abaixos pertencem a inscrição cadastrada neste e-mail:</p>
<p>Número da inscrição: {{$inscricao->id}}</p>
<p>Inscrição efetuada em: {{$dataTempoBR}}</p>
<p>Nome: {{$inscricao->nome}}</p>
<p>Data de nascimento: {{$dataBR}}</p>
<p>CPF: {{$inscricao->cpf}}</p>
<p>E-mail: {{$inscricao->email}}</p>
<p>RG: {{$inscricao->rg}}</p>
<p>Sexo: {{$inscricao->sexo}}</p>
<p>Telefone: {{$inscricao->telefone}}</p>
<p>Celular: {{$inscricao->telefoneAlternativo}}</p>
<p>CEP: {{$inscricao->cep}}</p>
<p>UF: {{$inscricao->uf}}</p>
<p>Cidade: {{$inscricao->cidade}}</p>
<p>Bairro: {{$inscricao->bairro}}</p>
<p>Endereço: {{$inscricao->rua}}</p>
<p>Número: {{$inscricao->numero}}</p>
<p>Complemento: {{$inscricao->complemento}}</p>
<p>Possui deficiência: {{$inscricao->deficiencia}}. {{$inscricao->deficienciaDescricao}}</p>
<p>Emprego: {{$emprego->emprego}} </p>
<p>Títulos selecionados: 
@foreach($inscricao->titulos as $tit)
    {{$tit->titulo}} (valor: {{$tit->pontos}} pontos).
@endforeach 
</p>
