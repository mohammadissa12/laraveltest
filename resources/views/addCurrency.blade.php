<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Add Currency
    </div>
    <div class="card-body">
      <form name="store_currency" id="store_currency" method="post" action="{{url('store_currency')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Currency Name</label>
          <input type="text" id="CurenncyName" name="CurenncyName" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Defualt Value</label>
          <input type="text" id="defualt_value" name="defualt_value" class="form-control" required="">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>