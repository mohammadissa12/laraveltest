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
       
      <form name="final_price" id="final_price" method="post" action="{{url('final_price')}}">
       @csrf
      
        <div class="form-group">
          <label for="exampleInputEmail1">Project Name: </label>
          <label for="exampleInputEmail1">{{$project->project_name}}</label>
        </div>
       
          <div class="form-group">
            <label for="exampleInputEmail1">Price in default Currency: </label>
          <label for="exampleInputEmail1">{{$count}}</label>
          </div>  
          <input type="text" id="project_id" name="project_id" class="form-control" required="" hidden value="{{$project->id}}">
          <input type="text" id="final_price_defualt" name="final_price_defualt" class="form-control" required="" hidden value="{{$count}}">

          <div class="form-group">
            <label for="exampleInputEmail1">Final Price in other Currency </label>
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
    <div class="form-group">
        <label for="exampleInputEmail1">Final Price:</label>
        <label for="exampleInputEmail1">{{$other_price}}</label>
        
      </div>
     
      </form>
     
    </div>
  </div>
</div>  
</body>
</html>