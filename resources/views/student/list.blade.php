@extends('layout.master')
@section('header')

 <a href="main/create" class="btn btn-primary pull-right"> Create new student </a>
@stop


@section('content')

  <div id="dialog-confirm" title="Thông báo!" style="display: none;">
      <p>Bạn có chắc muốn xóa phần tử này hay không?</p>
  </div>  



  <form action="" method="post" id="admin-Form">
         <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <table class="table table-bordered table-striped">
  
    <select class="form-control" style="width: 200px;padding-left: 20px;" name="school" >
        
      {{-- <option selected value=""></option> --}}
      @foreach($schools as $key =>$school)
      <option  value="{{$key}}" >{{$school}}</option>
    @endforeach
      
    </select>
   <thead class="thead-dark ">
    <tr>
      <th style="position: relative;width: 50px;"><a style="color: black;"  onclick="javascript:sortList('id','asc')" id="id-asc"><img style="position: absolute; top:5px;left: 30px;" src="images/sort_asc.png" alt=""></a><a style="color: black;" onclick="javascript:sortList('id','desc')"  id="id-desc"><img style="position: absolute; top:20px;left: 30px;" src="images/sort_desc.png" alt=""></a>ID</th>
      <th style="position: relative;"><a style="color: black;"  onclick="javascript:sortList('name','asc')" id="id-asc"><img style="position: absolute; top:5px;left: 100px;" src="images/sort_asc.png" alt=""></a><a style="color: black;" onclick="javascript:sortList('name','desc')"  id="id-desc"><img style="position: absolute; top:20px;left: 100px;" src="images/sort_desc.png" alt=""></a>Name</th>
      <th>School</th>
      <th>address</th>
      <th>dateofbirth</th>
     
      <th>Update</th>
      <th>Delete</th>
    </tr>
    </thead>
    <tbody id="result">
   @foreach($students as $key =>$student)
    <tr class="item" id="item-{{$student->id}}">
     

      <td>{{$student->id}}</td>
      <td><a href="{{URL('main/'.$student->id)}}">{{$student->name}}</a></td>
      <td>  <a style="color: black"></a>{{$student->school->name}}</td>
      <td>{{$student->address}}</td>
      <td>{{$student->date_of_birth}}</td>

      <td> <a href="main/{{$student->id}}/edit" class="demo btn btn-success">
  Update</a></td>

      <td><a  href="javascript:deleteItem('{{$student->id}}')"  class="btn btn-warning "  ><span class="glyphicon glyphicon-remove"></span>Delete</a></td>
    </tr>
    @endforeach
    </tbody>
    <input type="hidden" name="filter_column" value="id">
    <input type="hidden" name="filter_dir" value="asc">
   

  </table>


  </form>


@stop
@section('script')
<script>
  $(document).ready(function(){
    $('#btn').click(function(){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      

    $.ajax({

                    /* the route pointing to the post function */
                    url: 'ajax',
                    type: 'post',
                     /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN,id:1},
                    dataType: 'json',
                     /* remind that 'data' is the response of the AjaxController */
                     success: function (data) { 
                          data.forEach(function(student) {
                          var result = '<tr><td>'+student.name+'<td></tr>';
                        console.log(result)
                      });
                                              
                           
                       
                     }
           }); 
    });

  });
</script>
@stop

