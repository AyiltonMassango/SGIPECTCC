<div style="margin-bottom: 1px">
    <img style="width: 30%; display: inline-block" src="{{public_path().'/schools/'.$escola->pasta.'/'.$escola->logo}}" height="100">
    <div style="width: 40%; display: inline-block">
        <h6 class="txt-center p-m"><strong>{{$enderecoEscola->avenida_rua.', '.$enderecoEscola->nr_casa.'-'.$provinciaEscola}}</strong></h6>
        <h6 class="txt-center p-m">Tell:&nbsp;<strong>{{$contactoEscola->nr_telefone.' || '.$contactoEscola->nr_alternativo}}</strong></h6>
        <h6 class="txt-center p-m">Email:&nbsp;<strong>{{$contactoEscola->email}}</strong></h6>
        <h6 class="txt-center p-m">Nuit:&nbsp;<strong>{{$escola->nuit}}</strong></h6>
        <h6 class="txt-center p-m"><strong>{{$provinciaEscola}}-Moçambique</strong></h6>
    </div>
    <div style="width: 24%; display: inline-block; padding-left: 15px">
        <img src="{{public_path().'/schools/'.$escola->pasta.'/'.$inscricao->foto_aluno}}" height="100">
    </div>
</div>
<div class="linha3">
    <h6><strong>Código de Barras:</strong><code>..........</code></h6>
    <h6><strong>Ficha Numero:</strong><code>{{$inscricao->nr_ficha}}</code></h6>
    <h6><strong>Data:</strong><code>{{date('d-m-Y')}}</code></h6>
</div>
<div class="linha2">
    <h6><strong>Apelido:</strong><code>{{$aluno->apelido}}</code></h6>
    <h6><strong>Outros Nomes:</strong><code>{{$aluno->nome}}</code></h6>
</div>
<div class="linha2">
    <h6><strong>Sexo:</strong><code>{{$aluno->sexo}}</code></h6>
    <h6><strong>Data de Nascimento:</strong><code>{{date_format(date_create($aluno->data_nascimento),'d-m-Y')}}</code></h6>
</div>
<div class="linha2">
    <h6><strong>Filho de :</strong><code>{{$aluno->nome_pai}}</code></h6>
    <h6><strong>E de:</strong><code>{{$aluno->nome_mae}}</code></h6>
</div>
<div class="linha3">
    <h6><strong>Nacionalidade:</strong><code>{{$aluno->nacionalidade}}</code></h6>
    <h6><strong>Naturalida de:</strong><code>{{$aluno->naturalidade}}</code></h6>
    <h6><strong>Distrito de:</strong><code>{{$distrito->designacao}}</code></h6>
</div>
<div class="linha3">
    <h6><strong>Provincia de:</strong><code>{{$provincia}}</code></h6>
    <h6><strong>Residente Em:</strong><code>{{$endereco->bairro}}</code></h6>
    <h6><strong>Av/Rua:</strong><code>{{$endereco->avenida_rua}}</code></h6>
</div>

<div class="linha3">
    <h6><strong>Quarteirão:</strong><code>{{$endereco->quarteirao}}</code></h6>
    <h6><strong>Numero de casa:</strong><code>{{$endereco->nr_casa}}</code></h6>
    <h6><strong>Estado Cívil:</strong><code>{{$aluno->estado_civil}}</code></h6>
</div>
<div class="linha3">
    <h6><strong>Local de Trabalho:</strong><code>{{$aluno->local_trabalho}}</code></h6>
    <h6><strong>Profissão:</strong><code>{{$aluno->profissao}}</code></h6>
    <h6><strong>Nível Académico:</strong><code>{{$aluno->nivel_academico}}</code></h6>
</div>
<div class="linha3">
    <h6><strong>Tipo de Documento:</strong><code>{{$documento->designacao}}</code></h6>
    <h6><strong>Nº do Documeto:</strong><code>{{$documento->nr_documento}}</code></h6>
    <h6><strong>Arq de:</strong><code>{{$documento->local_emissao}}</code></h6>
</div>  <div class="linha3">
    <h6><strong>Emitido aos:</strong><code>{{date_format(date_create($documento->data_emissao),'d-m-Y')}}</code></h6>
    <h6><strong>Contacto 1:</strong><code>{{$contacto->nr_telefone}}</code></h6>
    <h6><strong>Contacto 2:</strong><code>{{$contacto->nr_alternativo}}</code></h6>
</div>
<div class="linha3">
    <h6><strong>Classe de Automóvel:</strong><code>{{$carta_categria}}</code></h6>
    <h6><strong>Tipo de aulas:</strong><code>{{$inscricao->tipo_aulas}}</code></h6>
    <h6><strong></strong><code></code></h6>
</div>