<p>Confirmação de Inscrição no PSS nº 01/2019 da Prefeitura Municipal de Palmeira-PR</p>
<p>Número da inscrição: {{$inscricao->id}}</p>
<p>Inscrição efetuada em: {{$inscricao->created_at}}</p>
<p>Nome: {{$inscricao->nome}}</p>
<p>Data de nascimento: {{$inscricao->dataNascimento}}</p>
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
<p>Títulos: </p>
@foreach($inscricao->titulos as $tit)
    <p>{{$tit->titulo}} (valor do título: {{$tit->pontos}} pontos.)</p>
@endforeach 
