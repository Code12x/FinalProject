<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shady Oaks Retirement Village
    </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <div id="navigationBar">
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Pricing</a>
            <a href="#">Testimonies</a>
            <a href="#">Contact</a>
        </div>
    </header>



    <div id="logInSignUpButtons">
        <button action="{{ route('Authentication/Login') }}" method="get"></button>
        <button action="{{ route('Authentication/Register') }}" method="get"></button>
    </div>



    <footer>

    </footer>
</body>
</html>