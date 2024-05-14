                   <form action = {{ route('site.contato')}} method ="post">
                    @csrf
                        <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="borda-preta">
                        <br>
                        <input name="telefone" value="{{old('telefone')}}"  type="text" placeholder="Telefone" class="borda-preta">
                        <br>
                        <input name="email" value="{{old('email')}}"  type="text" placeholder="E-mail" class="borda-preta">
                        <br>
                        <select name="motivo_contato" class="borda-preta">
                            <option value="">Qual o motivo do contato?</option>
                             @foreach($motivo_contatos as $key => $motivo_contato)
                                <option value="{{$motivo_contato->id}}" {{ old('motivo_contato') == $motivo_contato->id ? 'selected' : '' }}>{{$motivo_contato->motivo_contato}}</option>
                            @endforeach
                        </select>
                        <br>
                        <textarea name="mensagem" class="borda-preta">@if (old('mensagem') != ''){{old ('mensagem')}} @else Preencha aqui a sua mensagem @endif</textarea>
                        <br>
                        <button type="submit" class="borda-preta">ENVIAR</button>
                    </form>
                    <pre>{{$errors}}</pre>
                    