@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <h1>Notícia {{$new->title,}}</h1>
    <p>{{$new->content}}</p>

@endsection