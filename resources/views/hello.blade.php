@extends('base')

@section('page_title', "Hello $name")

@section('vite')
    @parent
    @vite(['resources/css/hello.css'])
@endsection

@section('content')
    <h1>Hello {{ $name }}</h1>
@endsection
