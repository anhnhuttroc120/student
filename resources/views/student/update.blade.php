@extends('layout.master')
@section('header')
<h1>Create new cat</h1>
@stop

@section('content')
	<a  class="btn btn-primary" href="{{URL('main')}}">Trở về trang chủ</a>
@if($errors->any())
       <div class="alert alert-danger">
        <ul style="list-style-type: none">
            @foreach ($errors->all() as $error)
                <li >{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif


  {!! Form::model($student,['url' => 'main/'.$student->id, 'method' => 'put']) !!}
    @include('form.student')
    {!! Form::submit('Thay đổi thông tin', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}
  
@stop
