<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="Email">Email:</label><br>
        <input type="email" id = "email" name = "Email"> <br>
        <label for="Password">Password:</label><br>
        <input type="password" id = "password" name = "Password">
        <br>
        <input type="submit" value="Submit">
    </form>

    @if(isset($message))
        <script>
            alert("{{ $message }}");
        </script>
    @endif
</body>
</html>