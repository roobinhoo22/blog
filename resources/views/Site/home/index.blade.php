@extends('site.templates.template1')

@section('content')
    <h1>Home Page do Site</h1>
    {{ $var1 }} {{ $var2 }}

    @include('site.includes.sidebar')
@endsection



