@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <h1>Eventos {{$event->name}}</h1>
    <p>{{$event->content}}</p>
    <p>{{$event->beginning}}</p>
    <p>{{$event->end}}</p>
    <p>{{$event_category_id->name}}</p>

@endsection