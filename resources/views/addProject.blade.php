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
      <form name="store_project" id="store_project" method="post" action="{{url('store_project')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Project Name</label>
          <input type="text" id="project_name" name="project_name" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" id="description" name="description" class="form-control" required="">
          </div>
          {{-- <div class="form-group">
          <select class="form-control" name="currency_id">
            <option>Select Item</option>
            @foreach ($items as $key => $value)
                <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}> 
                    {{ $value }} 
                </option>
            @endforeach    
        </select>
    </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>