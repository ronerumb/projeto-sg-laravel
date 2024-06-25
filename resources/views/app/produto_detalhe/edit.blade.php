@extends('app.layouts.basico')



@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Editar Detalhes do Produto</p>
    </div>

    <div class="menu">
    <ul>
        <li><a href="{{route ('produto.index')}}">Voltar</a></li>
        <li><a href="">Consulta</a></li>
    </ul>

    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left:auto; margin-right:auto;">

            <h4>Produto</h4>
            <div>Nome: {{$produto_detalhe->produto->nome}}</div>
            <br>
            <div>Descrição: {{$produto_detalhe->produto->descricao}}</div>
            <br>

           @component('app.produto_detalhe._components.form_create_edit',['produto_detalhe'=>$produto_detalhe, 'unidades'=>$unidades])               
           @endcomponent
           
        </div>
    </div>

</div>




@endsection