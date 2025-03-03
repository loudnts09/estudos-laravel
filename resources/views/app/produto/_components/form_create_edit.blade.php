@if(isset($produto->id))

    <form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
        @csrf
        @method('PUT')

@else
    <form method="post" action="{{ route('produto.store') }}">
        @csrf

@endif
<select name="fornecedor_id" id="">
    <option value="">-- Selecione um Fornecedor --</option>
    @foreach ($fornecedores as $fornecedor)
    
        <option value="{{ $fornecedor->id }}" {{ ($produto->fornecedor_id ?? old('unidade_id')) == $fornecedor->id ? 'selected' : ''}}>{{ $fornecedor->nome }}</option>

    @endforeach
</select>
{{$errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}

    <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta" id="">
    {{$errors->has('nome') ? $errors->first('nome') : '' }}

    <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta" id="">
    {{$errors->has('descricao') ? $errors->first('descricao') : '' }}

    <input type="text" name="peso" placeholder="Peso" value="{{ $produto->peso ?? old('peso') }}" class="borda-preta" id="">
    {{$errors->has('peso') ? $errors->first('peso') : '' }}

    <select name="unidade_id" id="">
        <option value="">-- Selecione a Unidade de Medida --</option>
        @foreach ($unidades as $unidade)
        
            <option value="{{ $unidade->id }}" {{ ($produto->nome ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>

        @endforeach
    </select>
    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>