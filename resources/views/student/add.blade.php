@extends('layout.master')
@section('header')
<h1>Create new student</h1>
@stop

@section('content')
	<a  class="btn btn-primary" href="{{URL('main')}}">Trở về trang chủ</a>


  {!! Form::open(['url' => 'main', 'method' => 'post']) !!}
    @include('form.student')
      {!! Form::submit('Save Học sinh', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}

@stop
