@extends('base')

@section('page_title', 'Hello Laravel')

@section('vite')
    @parent
    @vite(['resources/css/hello.css'])
@endsection

@section('content')
    <h1>Hello Laravel</h1>
@endsection
