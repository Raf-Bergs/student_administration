@extends('layouts.template')

@section('title','Course')

@section('main')
    <h1>{{$courses->name}}</h1>
    <p>{{$courses->description}}</p>
    <p>List of students enrolled:</p>
    <ul>
    @foreach($students as $student)
        <li>it brokey</li>
    @endforeach
    </ul>
@endsection
