@extends('painel.templates.template')

@section('content')
    <b>Produto  {{ $product->name }}<b>
    <b>Descrição {{ $product->description}}<b>
    <hr>


    {!! Form::open(['route' => ['produtos.destroy', $product->id], 'method' => 'delete']) !!}
        {!! Form::submit("Deletar Produto: $product->name", ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection
