<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
    <title>Shady Oaks Retirement Village</title>
</head>
<body>
    <header>
        <div class="header">
            <img src="{{url('/images/logo.jpg')}}" alt="logo">
        </div>
    </header>
    
    <div class="content">
        <h1 class="main">Home Page</h1>
        <button type="button" class="buttonsHome" onclick="window.location='{{ url("Authentication/login") }}'">Log In</button>
        <button type="button" class="buttonsHome" onclick="window.location='{{ url("Authentication/register") }}'">Register</button>
    </div>
    
    @section('footer')
        <footer>
        </footer>
    @endsection
</body>
</html>