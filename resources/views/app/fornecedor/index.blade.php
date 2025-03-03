@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <form method="post" action="{{ route('app.fornecedor.listar')}}">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta" id="">
                    <input type="text" name="site" placeholder="Site" class="borda-preta" id="">
                    <input type="text" name="uf" placeholder="UF" class="borda-preta" id="">
                    <input type="text" name="email" placeholder="Email" class="borda-preta" id="">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
        </div>

    </div>

@endsection