@extends('app.layouts.basico')



@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Listagem de produtos</p>
    </div>

    <div class="menu">
    <ul>
        <li><a href="{{ route ('produto.create')}}">Novo</a></li>
        <li><a href="">Consulta</a></li>
    </ul>

    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left:auto; margin-right:auto;">
          
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descriçao</th>
                        <th>Peso</th>                        
                        <th>Unidade ID</th>
                        <th>Fornecedor</th>
                        <th>Comprimento</th> 
                        <th>Altura</th> 
                        <th>Largura</th>       
                        <th>Visualizar</th>
                        <th>Editar</th>
                        <th>Excluir</th>                    


                    </tr>

                </thead>
                
                <tbody>
                    @foreach ($produtos as $produto)
                    <tr>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->descricao}}</td>
                        <td>{{$produto->peso}}</td>
                        <td>{{$produto->unidade_id}}</td>
                        <td>{{$produto->fornecedor->nome}}</td>
                        <td>{{$produto->itemDetalhe->comprimento ?? ''}}</td>
                        <td>{{$produto->itemDetalhe->altura ?? ''}}</td>
                        <td>{{$produto->itemDetalhe->largura ?? ''}}</td>
                        <td><a href="{{ route('produto.show',['produto'=> $produto->id])}}">Visualizar</a></td>
                        <td><a href="{{ route ('produto.edit',['produto'=> $produto->id])}}">Editar</a></td>
                        <td>
                            <form id="form_{{$produto->id}}" action="{{route ('produto.destroy',['produto'=>$produto->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                            <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                        <tr>
                            <td colspan="12">
                                <p>Pedidos</p>
                                @foreach ( $produto->pedidos as $pedido )
                                <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id])}}">
                                  Pedido :   {{$pedido->id}}
                                </a>
                                
                                    
                                @endforeach
    
                            </td>

                        
                        
                    </tr>
                    @endforeach

                </tbody>

              
            </table>
            {{$produtos->appends($request)->links()}}
              
         
        </div>
    </div>

</div>




@endsection