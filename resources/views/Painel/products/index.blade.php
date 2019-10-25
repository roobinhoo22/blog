@extends('painel.templates.template')

@section('content')
    <h1 class="text-center">Lista de Produtos</h1>

<a class="btn btn-success" href="{{ route('produtos.create')}}" role="button">Novo</a>
    <br><br>
    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th class="text-right">Ações</th>
        </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name}}</td>
                <td>{{ $product->description }}</td>
                <td class="text-right">
                <a class="btn btn-primary" href="{{ route('produtos.edit', $product->id )}}" role="button">Editar</a>
                <a class="btn btn-danger" href="{{ route('produtos.show', $product->id )}}" role="button">Deletar</a>
                </td>
            </tr>
        @endforeach

    </table>

    {{ $products->links() }}
@endsection



