<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="scrf-token" content="{{ csrf_token() }}">
    <title>ANMC Webiste</title>

    <link href="{{ url('css/bootstrap.min.css')}}" rel="stylesheet">
    
</head>
<body>
    <div class="container">
        <div class="row mt-5 pt-5">
            @yield('content')
        </div>
    </div>
</body>
</html>