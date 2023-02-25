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
       
      <form name="currency_converter_result" id="currency_converter_result" method="post" action="{{url('currency_converter_result')}}">
       @csrf
      
          <div class="form-group">
            <label for="exampleInputEmail1">From Currency</label>
            <select class="form-control" name="currency_id_from">
            <option>Select Item</option>
            @foreach ($items as $key => $value)
                <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}> 
                    {{ $value }} 
                </option>
               
            @endforeach    
        </select>
        <div class="form-group">
            <label for="exampleInputEmail1">Value</label>
            <input type="text" id="curr_value" name="curr_value" class="form-control" required="">
          </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">To Currency</label>
        <select class="form-control" name="currency_id_to">
        <option>Select Item</option>
        @foreach ($items as $key => $value)
            <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}> 
                {{ $value }} 
            </option>
           
        @endforeach    
    </select>
</div>

        <button type="submit" class="btn btn-primary">Submit</button>
      
      </form>
     
      <div class="form-group">
        <label for="exampleInputEmail1">Result:</label>
        <label for="exampleInputEmail1">{{$result}}</label>
      </div>
    </div>
  </div>
</div>  
</body>
</html>