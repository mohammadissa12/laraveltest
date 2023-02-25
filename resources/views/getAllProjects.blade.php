<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased text-center">
        <div class="container mt-4">
            @if(session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif
            @foreach ($get_all_projects as $value)
            <div>
               
                <a href="{{url('project_final_price/'.$value->id)}}">{{ $value->project_name }}</a>
            </div>
            @endforeach
    </body>
</html>
