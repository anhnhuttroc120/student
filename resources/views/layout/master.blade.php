<!DOCTYPE html>
<html>
  <head>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="css/box.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css">
     <meta name="csrf-token" content="{{ csrf_token() }}" />


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>

    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
        
    <script src="js/group.js"></script>
    <script src="js/custom.js"></script>


  

    <meta charset="utf-8">

    <title>Laravel 23</title>
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        @yield('header')
      </div>
      @if($errors->any())
       <div class="alert alert-danger">
        <ul style="list-style-type: none">
            @foreach ($errors->all() as $error)
                <li >{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif
      @if (Session::has('success'))
        <div class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      @endif
      @yield('content')
    </div> {{-- container  --}} 
  
    @yield('script')
  </body>
</html>
