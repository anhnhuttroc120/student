@extends('layout.master')
@section('header')
 <h1>Show detail Student</h1>
@stop

@section('content')
  <h3>Name: {{$student->name}}</h3>
  <h3>School: {{$student->school->name ?? ''}}</h3>
  <h3>Date of birth: {{$student->date_of_birth}}</h3>
  <h3>Address:{{$student->address}}</h3>
  <h3>Last modify: {{$student->updated_at}}</h3>

  <a href="{{url('main')}}" class="btn btn-success">Back to home page</a>
@stop
