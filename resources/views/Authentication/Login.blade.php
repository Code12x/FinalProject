<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        form {
            /* background-color: #604324; */
            height: 400px;
            width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        body {
            background-color:#FFE8C5;
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>

</head>
<body>
    <div class="formDiv">
        <form action="" method="post">
            <label for="Email">Email:</label><br>
            <input type="email" id = "email" name = "Email"> <br>
            <label for="Password">Password:</label><br>
            <input type="password" id = "password" name = "Password">
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>

    @if(isset($message))
        <script>
            alert("{{ $message }}");
        </script>
    @endif
</body>
</html>