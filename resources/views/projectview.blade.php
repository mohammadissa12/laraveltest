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
       
      <form name="store_price" id="store_price" method="post" action="{{url('store_price')}}">
       @csrf
      
        <div class="form-group">
          <label for="exampleInputEmail1">Project Name: </label>
          <label for="exampleInputEmail1">{{$project->project_name}}</label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Project Description: </label>
          <label for="exampleInputEmail1">{{$project->description}}</label>
          <input type="text" id="project_id" name="project_id" class="form-control" required="" hidden value="{{$project->id}}">
          </div>
          <div class="form-group">
          <select class="form-control" name="currency_id">
            <option>Select Item</option>
            @foreach ($items as $key => $value)
                <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}> 
                    {{ $value }} 
                </option>
               
            @endforeach    
        </select>
        
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="text" id="price" name="price" class="form-control" required="">
      </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      
      </form>
     
    </div>
  </div>
</div>  
</body>
</html>