@if(isset($produto_detalhe->id))

    <form method="post" action="{{ route('produto.update', ['produto' => $produto_detalhe->id]) }}">
        @csrf
        @method('PUT')

@else
    <form method="post" action="{{ route('produto-detalhe.store') }}">
        @csrf

@endif
    <input type="text" name="nome" value="{{ $produto_detalhe->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta" id="">
    {{$errors->has('nome') ? $errors->first('nome') : '' }}

    <input type="text" name="descricao" value="{{ $produto_detalhe->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta" id="">
    {{$errors->has('descricao') ? $errors->first('descricao') : '' }}

    <input type="text" name="peso" placeholder="Peso" value="{{ $produto_detalhe->peso ?? old('peso') }}" class="borda-preta" id="">
    {{$errors->has('peso') ? $errors->first('peso') : '' }}

    <select name="unidade_id" id="">
        <option value="">-- Selecione a Unidade de Medida --</option>
        @foreach ($unidades as $unidade)
        
            <option value="{{ $unidade->id }}" {{ ($produto_detalhe->nome ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>

        @endforeach
    </select>
    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>