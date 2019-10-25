@extends('painel.templates.template')

@section('content')

<hr>

@if( isset($errors) && count($errors) )
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if (isset($product))
    <form class="form" method="post" action="{{ route('produtos.update', $product->id) }}">
    {!! method_field('PUT') !!}
@else 
    <form class="form" method="post" action="{{ route('produtos.store') }}">
@endif


    {!! csrf_field() !!}
    <br>
    <div class="row">
        <div class="col-lg-12">
        <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ $product->name  }}">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <input type="text" class="form-control" name="number" type="number" placeholder="Number" value="{{ $product->number  }}">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <select name="category" class="form-control">
                @foreach ($categorys as $category)
                    <option value="{{ $category }}"> {{ $category }}</option>
                @endforeach

            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <input type="text" class="form-control" name="" placeholder="Descrição" value="{{ $product->description  }}">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-8">
            <input type="text" class="form-control" name="image" placeholder="Imagem" value="{{ $product->image }}">
        </div>
        <div class="col-lg-4">
            
               Active ?</label><input type="checkbox" class="form-control" name="active" value="1">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>


@endsection
